<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wallet';

    public static function getBalance($fullName)
    {
        return self::where('users.full_name', '=', $fullName)
            ->join('users', 'users.id', '=', 'wallet.user_id')
            ->select('users.id', 'users.full_name', 'wallet.balance')
            ->first();
    }
}
