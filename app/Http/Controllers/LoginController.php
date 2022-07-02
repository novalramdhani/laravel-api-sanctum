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
        if (Auth::attempt($request->all())) {
            $user = Auth::user();

            return (new UserResource($user))->additional([
                'token' => $user->createToken('myAppToken')->plainTextToken
            ]);

            return response()->json([
                'code' => 401,
                'status' => false,
                'message' => 'Your credentials must be match'
            ], 401);
        }
    }
}
