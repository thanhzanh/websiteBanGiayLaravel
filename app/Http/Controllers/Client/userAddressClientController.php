<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;

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

    public function update(Request $request, $id)
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

        $request->validate([
            'receiver_name' => 'required|string|max:255',
            'receiver_phone' => 'required|digits:10',
            'address' => 'required|string',
        ]);

        $address->update($request->all());

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
}
