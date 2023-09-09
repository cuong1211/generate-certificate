<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nhập Thông Tin Chứng Thực</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"] {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Nhập Thông Tin Chứng Thực</h1>
        <form action="{{route('gen.cert')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="cn">Tên website (CN):</label>
                <input type="text" name="cn" id="cn" required>
            </div>
            <div class="form-group">
                <label for="o">Tên tổ chức (O):</label>
                <input type="text" name="o" id="o" required>
            </div>
            <div class="form-group">
                <label for="ou">Tên đơn vị (OU):</label>
                <input type="text" name="ou" id="ou" required>
            </div>
            <div class="form-group">
                <label for="c">Quốc gia (C):</label>
                <input type="text" name="c" id="c" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Tạo chứng thực">
            </div>
        </form>
    </div>
</body>
</html>
