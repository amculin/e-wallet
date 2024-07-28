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
}
