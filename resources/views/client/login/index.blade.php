<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Login</title>
</head>

<body class="bg-[#45cb9e] flex items-center justify-center min-h-screen">
    <div class="w-96 p-6 shadow-lg bg-white rounded-md">
        <!-- @include('client.mixins.flash-messages')
          -->

        <h1 class="font-bold items-center text-center text-3xl mb-8">LOGIN</h1>
        <form action="{{ URL::to('/home') }}" method="post">
            @csrf
            <div class="items-center">
                <label for="email">Email <span class="text-red-600">*</span></label> <br>
                <input type="text" name="email"
                    class="w-full mt-2 mb-2 p-3 rounded-[4rem] outline-none border-solid border">
                @if ($errors->has('email'))
                    <span class="font-bold italic text-red-500">* {{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="items-center">
                <label for="password">Password <span class="text-red-600">*</span> </label> <br>
                <input type="password" name="password"
                    class="w-full mt-2 mb-2 p-3 rounded-[4rem] outline-none border-solid border">
                @if ($errors->has('password'))
                    <span class="font-bold italic text-red-500">* {{ $errors->first('password') }}</span>
                @endif
            </div>
            <div>
                <a href="#" class="flex justify-end text-gray-500 italic">Forgot Password?</a>
            </div>
            <div>
                <input type="submit" value="Login"
                    class="pt-2 pb-2 pl-10 pr-10 mt-6 text-2xl text-white font-bold bg-indigo-600 w-full rounded-3xl hov" />
            </div>
        </form>
        <p class="text-center text-gray-600 mt-4">
            Nếu bạn chưa có tài khoản? <a href="{{ route('account.signup') }}" class="text-indigo-600 hover:underline">Đăng ký</a>
        </p>
    </div>
</body>

</html>
