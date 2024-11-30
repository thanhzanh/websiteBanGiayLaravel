<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Lấy lại mật khẩu</title>
</head>

<body class="bg-[#45cb9e] flex items-center justify-center min-h-screen">
    <div class="w-96 p-6 shadow-lg bg-white rounded-md">

        <h1 class="font-bold items-center text-center text-xl mb-8">Nhập email để lấy lại mật khẩu</h1>
        <form action="{{ route('admin.forgot-password.linkEmail') }}" method="post">
            @csrf
            @method('POST')
            <div class="items-center">
                <label for="email">Email</label> <br>
                <input type="text" name="admin_email" class="w-full mt-2 mb-2 p-3 rounded-[4rem] outline-none border-solid border">
                @error('admin_email')
                <small class="text-[12px] italic font-bold text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div>
                <input type="submit" value="Xác nhận email" class="pt-2 pb-2 pl-10 pr-10 mt-6 text-xl text-white font-bold bg-indigo-600 w-full rounded-3xl hov" />
            </div>
        </form>
    </div>
</body>

</html>