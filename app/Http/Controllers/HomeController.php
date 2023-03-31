<?php

namespace App\Http\Controllers;

use App\Models\Surah;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $surah = Surah::with('surah_audio')->first();

        return view('home', ['surah' => $surah]);
    }
}
