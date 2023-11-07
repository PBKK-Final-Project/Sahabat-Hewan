<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function index()
    {
        $dokters = User::where('role_id', 1)->get();

        return view('consult.consult', [
            'dokters' => $dokters
        ]);
    }

    public function show($id)
    {
        $id = (int) $id;
        $dokter = User::where('id', $id)->where('role_id', 1)->first();

        dd($dokter->avatar);    

        return view('consult.dokter', ['dokter' => $dokter]);
    }
}

