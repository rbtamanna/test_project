<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate(Request $request)
    {
//        dd('jknfdvjn');
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ]);
            dd($validator);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first(),
                    'data' => null,
                ], 401);
            }
            $response = $this->authService->authenticate($request->all());
            return response()->json([
                'status' => true,
                'error' => 'null',
                'data' => $response,
            ], 200);
        } catch (\Exception $exception) {
                return response()->json([
                    'status' => false,
                    'error' => $exception->getMessage(),
                    'data' => null,
                ], 401);
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return response()->json([
            'message' => 'logged out',
    ], 200);
    }
}
