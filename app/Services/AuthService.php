<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function authenticate($data) : mixed
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'deleted_at' => null])) {
            $user = User::find(Auth::id());
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();


            $user_data = [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ];

            session(['user_data' => $user_data]);
            return $user_data;
        } else {
            return false;
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->flush();
        return true;
    }
}
