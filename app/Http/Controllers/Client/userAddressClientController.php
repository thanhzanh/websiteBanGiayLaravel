<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\BackupGlobals;

class userAddressClientController extends Controller
{
    public function index()
    {
        $infoUser = session('infoUser');

        if (!$infoUser) {
            toastr()->success('Bạn cần đăng nhập để thực hiện thao tác này.');
            return redirect()->route('account.login');
        }

        // Lấy danh sách địa chỉ của người dùng
        $addresses = UserAddress::where('user_id', $infoUser->user_id)->get();

        return view('client.pages.address.index', compact('addresses'));
    }

    public function addAddress(Request $request)
    {

        try {
            $infoUser = session('infoUser');

            if (!$infoUser) {
                toastr()->success('Bạn cần đăng nhập để thực hiện thao tác này.');
                return redirect()->route('account.login');
            }

            $request->validate([
                'receiver_name' => 'required|string|max:255',
                'receiver_phone' => 'required|digits:10',
                'address' => 'required|string',
            ]);

            $isDefault = $request->has('is_default');

            // Nếu là địa chỉ mặc định, cập nhật các địa chỉ khác
            if ($isDefault) {
                UserAddress::where('user_id', $infoUser->user_id)->update(['is_default' => false]);
            }

            // Tạo địa chỉ mới
            UserAddress::create([
                'user_id' => $infoUser->user_id,
                'label' => $request->label,
                'receiver_name' => $request->receiver_name,
                'receiver_phone' => $request->receiver_phone,
                'address' => $request->address,
                'is_default' => $isDefault,
            ]);

            toastr()->success('Địa chỉ đã được thêm thành công.');
            return back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
    }

    public function updatePatch(Request $request, $id)
    {

        $infoUser = session('infoUser');

        if (!$infoUser) {
            toastr()->success('Bạn cần đăng nhập để thực hiện thao tác này.');
            return redirect()->route('account.login');
        }

        $request->validate([
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|digits:10',
            'address' => 'required|string',
        ]);

        // tìm địa chỉ theo id gửi lên
        $address = UserAddress::where('user_address_id', $id)->where('user_id', $infoUser->user_id)->first();

        $isDefault = $request->has('is_default') ? 1 : 0; // nếu địa chỉ mặc định

        // neu la dia chi mac dinh, cap nhat lai tat ca con lai thanh khong mac dinh
        if ($isDefault) {
            UserAddress::where('user_id', $id)->update(['is_default' => false]);
        }

        // cap nhat lai dia chi
        $address->update([
            'label' => $request->label,
            'receiver_name' => $request->receiver_name,
            'receiver_phone' => $request->receiver_phone,
            'address' => $request->address,
            'is_default' => $request->is_default
        ]);

        toastr()->success('Địa chỉ đã được cập nhật.');

        return back();
    }

    public function delete($id)
    {
        $infoUser = session('infoUser');

        if (!$infoUser) {
            toastr()->success('Bạn cần đăng nhập để thực hiện thao tác này.');
            return redirect()->route('account.login');
        }

        $address = UserAddress::where('user_address_id', $id)->where('user_id', $infoUser->user_id)->first();

        if (!$address) {
            toastr()->error('Địa chỉ không tồn tại.');
            return back();
        }

        // không thể xóa địa chỉ mặc định
        if ($address->is_default) {
            toastr()->error('Không thể xóa địa chỉ mặc định.');
            return back();
        }

        $address->delete();

        toastr()->success('Xóa địa chỉ thành công.');
        return back();
    }

    public function setDefault($id)
    {
        $infoUser = session('infoUser');
        if (!$infoUser) {
            toastr()->success('Bạn cần đăng nhập để thực hiện thao tác này.');
            return redirect()->route('account.login');
        }

        // Cập nhật các địa chỉ khác thành không mặc định
        UserAddress::where('user_id', $infoUser->user_id)->update(['is_default' => false]);

        $address = UserAddress::where('user_address_id', $id)
            ->where('user_id', $infoUser->user_id)
            ->first();

        if (!$address) {
            toastr()->error('Địa chỉ không tồn tại.');
            return back();
        }

        $address->update(['is_default' => true]);

        toastr()->success('Địa chỉ mặc định đã được cập nhật.');
        return back();
    }

    public function updateShippingAddress(Request $request)
    {

        $infoUser = session('infoUser');


        try {
            // 1. Tắt cờ địa chỉ mặc định hiện tại cho user
            UserAddress::where('user_id', $infoUser->user_id)->update(['is_default' => false]);

            // 2. Cập nhật địa chỉ mới làm địa chỉ mặc định
            UserAddress::where('user_address_id', $request->user_address_id)
                ->update(['is_default' => true]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // Lấy thông tin địa chỉ mới
    public function getCurrentShippingAddress()
    {
        $infoUser = session('infoUser');

        $defaultAddress = UserAddress::where('user_id', $infoUser->user_id)
            ->where('is_default', true)
            ->first();

        if ($defaultAddress) {
            return response()->json([
                'address' => $defaultAddress->address,
                'receiver_name' => $defaultAddress->receiver_name,
                'receiver_phone' => $defaultAddress->receiver_phone,
            ]);
        }

        return response()->json(['error' => 'Không tìm thấy địa chỉ mặc định'], 404);
    }
}
