<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const DEPOSIT = 1;
    const WITHDRAWAL = 2;
    const PURCHASE = 3;

    const IS_FAILED = 2;
    const IS_SUCCESS = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction';

    public static function getAll($filters)
    {
        $model = self::select(
                'users.full_name', 'users.email', 'transaction.order_id', 'transaction.amount', 'transaction.status',
                'transaction.created_at as transaction_time'
            )
            ->join('wallet', 'wallet.id', '=', 'transaction.wallet_id')
            ->join('users', 'users.id', '=', 'wallet.user_id');

        if ($filters->has('type')) {
            $model->where('transaction.type', $filters->get('type'));
        }

        if ($filters->has('name')) {
            $model->where('users.full_name', 'like', "%{$filters->get('name')}%");
        }

        if ($filters->has('status')) {
            $model->where('transaction.status', $filters->get('status'));
        }

        return $model->simplePaginate(env('DISPLAY_PER_PAGE'));
    }
}
