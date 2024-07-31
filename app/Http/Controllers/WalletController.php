<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\UserAccount;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WalletController extends Controller
{
    public function authChecker($token)
    {
        $data = Users::findUserByToken($token);

        return $data;
    }

    public function makePaymentRequest($token, $data)
    {
        $url = env('PAYMENT_URL');
        $response = Http::withToken($token)->get($url, $data);

        return $response;
    }

    public function index(Request $request)
    {
        $user = $this->authChecker($request->bearerToken());

        if (!$user) {
            return response(['message' => 'Invalid credential!'], 401);
        }

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

        if (!$user) {
            return response(['message' => 'Invalid credential!'], 401);
        }

        $wallet = Wallet::getBalance($user->id);

        $paymentResponse = $this->makePaymentRequest($request->bearerToken(), [
            'order_id' => $request->input('order_id'),
            'amount' => $request->input('amount'),
            'timestamp' => $request->input('timestamp')
        ]);

        if ($paymentResponse->ok()) {
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
        } else {
            return response(['message' => 'Error while connecting with payment gateway!'], 500);
        }
    }

    public function withdrawal(Request $request)
    {
        $user = $this->authChecker($request->bearerToken());

        if (!$user) {
            return response(['message' => 'Invalid credential!'], 401);
        }

        $wallet = Wallet::getBalance($user->id);

        $paymentResponse = $this->makePaymentRequest($request->bearerToken(), [
            'order_id' => $request->input('order_id'),
            'amount' => $request->input('amount'),
            'timestamp' => $request->input('timestamp')
        ]);

        if ($paymentResponse->ok()) {
            $additionalData = $request->input('additional_data');
            $additionalData['client_time'] = $request->input('timestamp');

            if ($request->amount > $wallet->balance) {
                $status = Transaction::IS_FAILED;
                $updateBalance = false;
            } else {
                $status = Transaction::IS_SUCCESS;
                $updateBalance = true;
            }

            $transaction = new Transaction;
            $transaction->wallet_id = $wallet->id;
            $transaction->order_id = $request->input('order_id');
            $transaction->amount = $request->input('amount');
            $transaction->type = Transaction::WITHDRAWAL;
            $transaction->status = $status;
            $transaction->additional_data = json_encode($additionalData);
            $transaction->created_by = $user->id;
            $transaction->save();

            if ($updateBalance) {
                $wallet->balance = $wallet->balance - $transaction->amount;
                $wallet->updated_by = $user->id;
                $wallet->save();
            } else {
                return response(['message' => 'Insufficient Balance!'], 422);
            }

            return [
                'order_id' => $transaction->order_id,
                'amount' => $transaction->amount,
                'status' => $status
            ];
        } else {
            return response(['message' => 'Error while connecting with payment gateway!'], 500);
        }
    }

    public function purchase(Request $request)
    {
        $user = $this->authChecker($request->bearerToken());

        if (!$user) {
            return response(['message' => 'Invalid credential!'], 401);
        }

        $wallet = Wallet::getBalance($user->id);

        $paymentResponse = $this->makePaymentRequest($request->bearerToken(), [
            'order_id' => $request->input('order_id'),
            'amount' => $request->input('amount'),
            'timestamp' => $request->input('timestamp')
        ]);

        if ($paymentResponse->ok()) {
            $additionalData = $request->input('additional_data');
            $additionalData['client_time'] = $request->input('timestamp');

            if ($request->amount > $wallet->balance) {
                $status = Transaction::IS_FAILED;
                $updateBalance = false;
            } else {
                $status = Transaction::IS_SUCCESS;
                $updateBalance = true;
            }

            $transaction = new Transaction;
            $transaction->wallet_id = $wallet->id;
            $transaction->order_id = $request->input('order_id');
            $transaction->amount = $request->input('amount');
            $transaction->type = Transaction::PURCHASE;
            $transaction->status = $status;
            $transaction->additional_data = json_encode($additionalData);
            $transaction->created_by = $user->id;
            $transaction->save();

            if ($updateBalance) {
                $wallet->balance = $wallet->balance - $transaction->amount;
                $wallet->updated_by = $user->id;
                $wallet->save();
            } else {
                return response(['message' => 'Insufficient Balance!'], 422);
            }

            return [
                'order_id' => $transaction->order_id,
                'amount' => $transaction->amount,
                'status' => $status
            ];
        } else {
            return response(['message' => 'Error while connecting with payment gateway!'], 500);
        }
    }
}
