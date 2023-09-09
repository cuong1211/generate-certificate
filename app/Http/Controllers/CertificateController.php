<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        return view('form');
    }
    public function report($cn)
    {
        return view('report', compact('cn'));
    }

    public function generate(Request $request)
    {
        // $public_path = public_path('ca/ca-crt.pem');
        // dd($public_path);
        // Lấy thông tin từ form
        $cn = $request->input('cn');
        $o = $request->input('o');
        $ou = $request->input('ou');
        $c = $request->input('c');

        $tmpdir = sys_get_temp_dir() . '/openssl_' . uniqid();
        mkdir($tmpdir);

        $keyfile = "$tmpdir/client-key.pem";
        $certfile = "$tmpdir/client-crt.pem";

        // Tạo khóa riêng
        exec("openssl genrsa -out $keyfile");

        // Tạo yêu cầu chứng thực
        $subj = "/CN=$cn/O=$o/OU=$ou/C=$c";
        // dd($subj);
        exec("openssl req -new -key $keyfile -out $tmpdir/client.csr -subj $subj");

        // Tạo chứng thực từ yêu cầu và CA (sử dụng CA đã có sẵn)
        // exec("openssl x509 -req -in $tmpdir/client.csr -CA ca-crt.pem -CAkey ca-key.pem -CAcreateserial -out $certfile");
        // get file ca-crt.pem and ca-key.pem from storage/app/ca
        $public_path = public_path('ca\ca-crt.pem');
        $public_path_key = public_path('ca\ca-key.pem');
        // dd($public_path);
        exec("openssl x509 -req -in $tmpdir/client.csr -CA $public_path -CAkey $public_path_key -CAcreateserial -out $certfile");
        // Lưu trữ chứng thực và khóa riêng
        // dd($certfile);
        Storage::put('certificates/'.$cn.'/' . $cn . '.crt', file_get_contents($certfile));
        Storage::put('certificates/'.$cn.'/' . $cn . '.key', file_get_contents($keyfile));

        // Xóa thư mục tạm thời
        array_map('unlink', glob("$tmpdir/*"));
        rmdir($tmpdir);

        return redirect()->route('cert.report', ['cn' => $cn]);
    }
    public function downloadCertificate($cn)
    {
        // Lấy đường dẫn tới tệp chứng thực đã tạo
        $certificatePath = storage_path("app/certificates/{$cn}/{$cn}.crt");

        // Kiểm tra xem tệp chứng thực có tồn tại không
        if (file_exists($certificatePath)) {
            // Tạo tên tệp xuất khẩu
            $exportedFileName = "{$cn}.crt";

            // Thiết lập các header để tải xuống tệp
            header("Content-Disposition: attachment; filename={$exportedFileName}");
            header("Content-Type: application/x-x509-ca-cert");

            // Đọc và trả về nội dung của tệp chứng thực
            return response(file_get_contents($certificatePath), 200);
        } else {
            // Xử lý tệp chứng thực không tồn tại
            return abort(404);
        }
    }
}
