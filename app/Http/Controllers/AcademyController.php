<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Academy;

class AcademyController extends Controller
{
    public function index()
    {
        $academies = Academy::all();
        return view('academy.academy', ['academies' => $academies]);
    }
    public function singleAcademy(Academy $article)
    {
        return view('academy.singleacademy', ['academy' => $article]);
    }
}