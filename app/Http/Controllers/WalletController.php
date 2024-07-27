<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $fullName = base64_decode($request->bearerToken());

        $data = Wallet::getBalance($fullName);

        if ($data) {
            return $data;
        } else {
            return response(['Data Not Found!'], 404);
        }
    }
}
