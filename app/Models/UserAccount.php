<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_account';

    public static function getAccount($userID)
    {
        $model = self::where('user_account.user_id', $userID)
            ->join('ref_bank', 'ref_bank.id', '=', 'user_account.bank_id')
            ->select('user_account.account_number', 'ref_bank.id', 'ref_bank.code', 'ref_bank.name')
            ->get();

        return $model;
    }
}
