<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\UserAccount;
use App\Models\Users;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public $user;

    public function authorized($token)
    {
        $data = Users::findAdminByToken($token);

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function index(Request $request)
    {
        if (! $this->authorized($request->bearerToken())) {
            return response(['message' => 'Invalid credential!'], 401);
        }

        $data = Transaction::getAll($request->collect());

        return $data;
    }
}
