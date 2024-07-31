<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;

    const ADMIN = 1;
    const USER = 2;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public static function login($email, $password)
    {
        $model = self::where('email', $email)->first();

        if (Hash::check($password, $model->password)) {
            return $model;
        }

        return false;
    }

    public static function findUserByToken($token)
    {
        $fullName = base64_decode($token);
        $model = self::where('full_name', $fullName)->where('type', self::USER)->first();

        return $model;
    }

    public static function findAdminByToken($token)
    {
        $fullName = base64_decode($token);
        $model = self::where('full_name', $fullName)->where('type', self::ADMIN)->first();

        return $model;
    }
}
