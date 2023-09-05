<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('gen.cert')}}" method="post">
        @csrf
        Common Name (CN): <input type="text" name="cn"><br>
        Organization Name (O): <input type="text" name="o"><br>
        Organizational Unit Name (OU): <input type="text" name="ou"><br>
        Country Name (C): <input type="text" name="c"><br>
        <input type="submit" value="Tạo chứng thực">
    </form>
</body>
</html>