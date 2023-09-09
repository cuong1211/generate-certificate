<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/generate-certificate', [CertificateController::class, 'index'])->name('gen.form');
Route::post('/generate-certificate', [CertificateController::class,'generate'])->name('gen.cert');
Route::get('/certificate-report/{cn}', [CertificateController::class,'report'])->name('cert.report');
Route::get('/certificate-download/{cn}', [CertificateController::class,'downloadCertificate'])->name('cert.download');
