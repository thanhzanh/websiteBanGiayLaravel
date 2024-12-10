<div class="bg-green-500 shadow-md rounded-lg p-6 w-full max-w-md mx-auto">
    <h2 class="text-white text-2xl font-bold mb-4">Xin chào</h2>
    <p class="text-white mb-4">Bạn đã yêu cầu thay đổi mật khẩu cho tài khoản của mình. Vui lòng nhấp vào liên kết dưới đây để đặt lại mật khẩu của bạn:</p>
    
    <a href="{{ route('account.reset-password', ['token' => $token]) }}" class="bg-white text-blue-500 rounded-md px-4 py-2 hover:bg-gray-100">Đặt lại mật khẩu</a>
    
    <p class="text-white mt-4">Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng bỏ qua email này.</p>
</div>