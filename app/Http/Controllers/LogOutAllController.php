<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'code' => 200,
            'message' => 'Logout with all tokens delete successfully.'
        ]);
    }
}
