<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset mật khẩu</title>
</head>
<body>
    <div class="bg-green-500 w-[700px] m-auto border-3 border-solid">
        <h2>Xin chào</h2>
        <p>Bạn đã yêu cầu thay đổi mật khẩu cho tài khoản của mình. Vui lòng nhấp vào liên kết dưới đây để đặt lại mật khẩu của bạn:</p>
        
        <a href="{{ route('admin.reset-password', $token) }}">Đặt lại mật khẩu</a>
        
        <p>Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng bỏ qua email này.</p>
    </div>

</body>
</html>

