<?php
namespace MyVendor\Admin\Models;

use Illuminate\Contracts\Auth\Authenticatable; // Thêm dòng này
use MongoDB\Laravel\Eloquent\Model;

class User extends Model implements Authenticatable // Implement Authenticatable
{
    protected $connection = 'mongodb';
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone', 'avatar'     
    ];

    protected $hidden = ['password'];

    // Thêm các phương thức cần thiết từ Authenticatable:
    public function getAuthPasswordName()
{
    return 'password'; // Tên cột chứa mật khẩu trong bảng người dùng
}
    public function getAuthIdentifierName()
    {
        return 'id'; // Hoặc tên cột bạn dùng để nhận dạng người dùng (mặc định là 'id')
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Mặc định là 'id'
    }

    public function getAuthPassword()
    {
        return $this->password; // Cung cấp mật khẩu của người dùng
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Cung cấp token nếu bạn muốn tính năng "remember me"
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Tên trường token lưu trong database
    }
}
