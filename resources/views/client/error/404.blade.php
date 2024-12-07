<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang không tồn tại</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 48px;
            color: #333;
        }

        p {
            font-size: 20px;
            color: #555;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>404 - Trang không tồn tại</h1>
    <p>Đường dẫn bạn nhập không đúng hoặc không tồn tại. Vui lòng kiểm tra lại.</p>
    <p><a href="{{ route('home') }}">Quay lại trang chủ</a></p>
</body>
</html>
