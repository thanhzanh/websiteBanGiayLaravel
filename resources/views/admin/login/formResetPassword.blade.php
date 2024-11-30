
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

        <h1 class="font-bold items-center text-center text-xl mb-8">Nhập mật khẩu mới và xác nhận mật khẩu</h1>
        <form method="POST" action="">     
            @csrf            
            <div>
                <label for="password">Mật khẩu mới</label>
                <input class="w-full mt-2 mb-2 p-3 rounded-[4rem] outline-none border-solid border" type="password" name="admin_password"/>
            </div>
        
            <div>
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input class="w-full mt-2 mb-2 p-3 rounded-[4rem] outline-none border-solid border" type="password" name="password_confirmation" />
            </div>
        
            <div>
                <button class="pt-2 pb-2 pl-10 pr-10 mt-6 text-xl text-white font-bold bg-indigo-600 w-full rounded-3xl hov" type="submit">Đặt lại mật khẩu</button>
            </div>
        </form>
    </div>
</body>

</html>


