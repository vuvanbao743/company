<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;

class Setting extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'settings';
    protected $primaryKey = '_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['_id', 'value'];

    // public static function get($key, $default = null)
    // {
    //     return optional(self::find($key))->value ?? $default;
    // }

    public static function set($key, $value)
    {
        return self::updateOrCreate(['_id' => $key], ['value' => $value]);
    }
}
