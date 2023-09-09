<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chứng Thực Đã Tạo</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        p {
            text-align: center;
        }

       

        .download-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Hover state */
        .download-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Chứng Thực Đã Được Tạo</h1>
    <p>Cảm ơn bạn đã tạo chứng thực. Bạn có thể tải xuống chứng thực tại liên kết dưới đây:</p>
    <a href="{{ route('cert.download', ['cn' => $cn]) }}" class="download-button">Tải Xuống Chứng Thực</a>
</body>

</html>
