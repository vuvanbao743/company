<?php
namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function showAccount()
    {
        $accounts = Account::all();
        return view('admin.accounts.index', compact('accounts'));
    }

    public function createAccount()
    {
        return view('admin.accounts.create');
    }

    public function storeAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string',
            'role' => 'required|'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        Account::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admins.account')->with('success', 'Tạo tài khoản thành công!');
    }

    public function showDetailAccount(string $id)
    {
        $account = Account::find($id);
        return view('admin.accounts.show', compact('account'));
    }

    public function showEditAccount(string $id)
    {
        $account = Account::find($id);
        return view('admin.accounts.edit', compact('account'));
    }

    public function updateAccount(Request $request, string $id)
    {
        $account = Account::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }
        $account->update($updateData);
        return redirect()->route('admins.account')->with('success', 'Thay đổi thông tin tài khoản thành công!');
    }

    public function deleteAccount($id)
    {
        $admin = Account::find($id);
        if ($admin->id == auth('admin')->user()->id) {
            return redirect()->route('admins.account')->with('error', 'Không thể xóa tài khoản đang đăng nhập!');
        }
        $admin->delete();
        return redirect()->route('admins.account')->with('success', 'Xóa tài khoản thành công!');
    }
}