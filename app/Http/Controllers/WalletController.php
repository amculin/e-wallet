<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\UserAccount;
use App\Models\Users;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function authChecker($token)
    {
        $data = Users::findUserByToken($token);

        if ($data) {
            return $data;
        } else {
            return response(['message' => 'Invalid credential!'], 401);
        }
    }

    public function index(Request $request)
    {
        $user = $this->authChecker($request->bearerToken());
        $data = Wallet::getBalance($user->id);
        $account = UserAccount::getAccount($user->id);

        if ($data) {
            return [
                'balance' => $data->balance,
                'account' => $account
            ];
        } else {
            return response(['message' => 'Data Not Found!'], 404);
        }
    }

    public function deposit(Request $request)
    {
        $user = $this->authChecker($request->bearerToken());
        $wallet = Wallet::getBalance($user->id);

        $additionalData = $request->input('additional_data');
        $additionalData['client_time'] = $request->input('timestamp');

        $transaction = new Transaction;
        $transaction->wallet_id = $wallet->id;
        $transaction->order_id = $request->input('order_id');
        $transaction->amount = $request->input('amount');
        $transaction->type = Transaction::DEPOSIT;
        $transaction->status = Transaction::IS_SUCCESS;
        $transaction->additional_data = json_encode($additionalData);
        $transaction->created_by = $user->id;
        $transaction->save();

        $wallet->balance = $wallet->balance + $transaction->amount;
        $wallet->updated_by = $user->id;
        $wallet->save();

        return [
            'order_id' => $transaction->order_id,
            'amount' => $transaction->amount,
            'status' => $transaction->status
        ];
    }

    public function withdrawal(Request $request)
    {

    }

    public function purchase(Request $request)
    {

    }
}
