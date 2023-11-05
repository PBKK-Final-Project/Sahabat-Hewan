<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me()
    {
        $me = auth()->user();

        return response()->json([
            'success' => true,
            'message' => 'User Profile',
            'code' => 200,
            'data' => $me
        ], 200);
    }
}
