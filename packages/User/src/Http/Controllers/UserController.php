<?php

namespace User\Http\Controllers;

use Illuminate\Http\Request;
use User\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showUser()
    {
        $title = "Quản lý tài khoản User";
        $users = User::all();
        return view('admin::admin.users.index', compact('users', 'title'));
    }

    public function createUser()
    {
        $title = "Thêm tài khoản";
        return view('admin::admin.users.create', compact('title'));
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'image'    => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
            'address'  => $request->address,
            'avatar'   => $request->avatar,
        ]);

        return redirect()->route('admins.user')->with('success', 'Tạo tài khoản thành công!');
    }


    public function showDetailUser(string $id)
    {
        $title = "Thông tin chi tiết tài khoản";
        $user = User::find($id);
        return view('admin::admin.users.show', compact('user', 'title'));
    }

    public function showEditUser(string $id)
    {
        $title = "Sửa tài khoản";
        $user = User::find($id);
        return view('admin::admin.users.edit', compact('user', 'title'));
    }

    public function updateUser(Request $request, string $id)
    {
        $account = User::find($id);

        if (!$account) {
            return redirect()->route('admins.account')->with('error', 'Tài khoản không tồn tại!');
        }

        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'avatar'   => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $updateData = [
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        if ($request->filled('avatar')) {
            $updateData['avatar'] = $request->avatar;
        }  

        $account->update($updateData);

        return redirect()->route('admins.user')->with('success', 'Cập nhật tài khoản thành công!');
    }

    public function deleteUser($id)
    {
        $admin = User::find($id);
        if ($admin->id == auth('admin')->user()->id) {
            return redirect()->route('admins.user')->with('error', 'Không thể xóa tài khoản đang đăng nhập!');
        }
        $admin->delete();
        return redirect()->route('admins.user')->with('success', 'Xóa tài khoản thành công!');
    }


    public function userDetail()
    {
        $user = Auth::guard('user')->user();
        return view('user::client.template1.profile', compact('user'));
    }

    public function userInfomation()
    {
        $user = Auth::guard('user')->user();
        return view('user::client.template1.edit', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        $user = Auth::guard('user')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        /** @var \User\Models\User $user */
        $user->update();

        return redirect()->route('user.template1.profile.edit')->with('success', 'Cập nhật thành công!');
    }
}
