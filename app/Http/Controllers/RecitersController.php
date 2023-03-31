<?php

namespace App\Http\Controllers;

use App\Models\Reciter;
use Illuminate\Http\Request;

class RecitersController extends Controller
{
    public function index()
    {
        $reciters = Reciter::all();
        return view('reciters', compact('reciters'));
    }

    public function show(Reciter $reciter)
    {
        return view('reciter', compact('reciter'));
    }
}
