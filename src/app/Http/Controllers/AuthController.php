<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Mail\Test;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Register as RegisterRequest;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = request(['email', 'password']);
        if (! $token = auth()->claims(['foo' => 'bar'])->attempt($credentials)) {
            return response()->json(['error' => '認証失敗'], 401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        SendMail::dispatch($user);

        return $user;
    }
    public function me()
    {
        return response()->json(auth()->user());
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

}
