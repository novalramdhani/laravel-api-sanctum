<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogOutAllController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->user()
                ->tokens()
                ->delete();

        return response()->json([
            'status' => true,
            'code' => Response::HTTP_OK,
            'message' => 'Logout with all tokens delete successfully.'
        ]);
    }
}
