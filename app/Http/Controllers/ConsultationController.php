<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function store_dokters()
    {
        $dokters = User::where('role_id', 1)->get();

        foreach ($dokters as $dokter) {
            Consultation::create([
                'dokter_id' => $dokter->id,
                'harga' => 20000
            ]);
        }

        return response()->json([
            'message' => 'success',
            'code', 200
        ], 200);
    }

    public function index()
    {
        $consultations = Consultation::with('dokters')->get();


        return view('consult.consult', [
            'consultations' => $consultations
        ]);

    }

    public function show($id)
    {
        $id = (int) $id;
        $consultation = Consultation::with('dokters')->where('id', $id)->first();

        return view('consult.dokter', ['consultation' => $consultation]);
    }
}
