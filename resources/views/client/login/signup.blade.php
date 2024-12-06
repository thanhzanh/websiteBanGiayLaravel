<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-[#45cb9e] flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-3xl font-bold text-center mb-6">Sign Up</h2>

        <form action="#" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Full Name <span
                        class="text-red-600">*</span></label>
                <input type="text" id="name" name="name"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address <span
                        class="text-red-600">*</span></label>
                <input type="email" id="email" name="email"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password <span
                        class="text-red-600">*</span></label>
                <input type="password" id="password" name="password"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="confirm-password" class="block text-gray-700 font-medium mb-2">Confirm Password <span
                        class="text-red-600">*</span></label>
                <input type="password" id="confirm-password" name="confirm-password"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                Sign Up
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            Nếu bạn đã có tài khoản? <a href="{{ route('account.login') }}" class="text-indigo-600 hover:underline">Đăng nhập</a>
        </p>
    </div>
</body>

</html>
