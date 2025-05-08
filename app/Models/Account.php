<?php
namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Account extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'admins';

    // protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['name', 'email', 'password', 'role'];
}