<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public static function login($email, $password)
    {
        $model = self::where('email', $email)->get();

        if (Hash::check($password, $model[0]->password)) {
            return $model[0];
        }

        return false;
    }
}
