<?php

namespace User\Models;
// use User\Database\Factories\UserFactory;
use User\Database\Factories\UserFactory;
// use Database\Factories\UserFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable; // Thêm dòng này

class User extends Model implements Authenticatable // Implement Authenticatable
{
    use HasFactory;
    public static function newFactory()
    {
        return UserFactory::new();
    }
    protected $connection = 'mongodb';
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'avatar'
    ];

    protected $hidden = ['password'];

    // Thêm các phương thức cần thiết từ Authenticatable:
    public function getAuthPasswordName()
    {
        return 'password'; // Tên cột chứa mật khẩu trong bảng người dùng
    }
    public function getAuthIdentifierName()
    {
        return 'id'; // tên cột nhận dạng người dùng 'id'
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // 'id'
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
