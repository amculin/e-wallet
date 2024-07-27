<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = Users::login($email, $password);

        if ($data !== false) {
            return [
                'email' => $data->email,
                'token' => base64_encode($data->full_name)
            ];
        } else {
            return response(['message' => 'Invalid Email or Password!'], 422);
        }
    }
}
