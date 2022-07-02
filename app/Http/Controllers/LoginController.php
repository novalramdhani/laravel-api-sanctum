<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();

            $token = $user->createToken('myAppToken');

            return (new UserResource($user))->additional([
                'token' => $token->plainTextToken
            ]);

            return response()->json([
                'code' => 401,
                'status' => false,
                'message' => 'Your credentials must be match'
            ], 401);
        }
    }
}
