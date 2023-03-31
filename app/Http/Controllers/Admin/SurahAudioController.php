<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reciter;
use Illuminate\Http\Request;

class SurahAudioController extends Controller
{
    public function upload($id)
    {
        $reciter = Reciter::find($id);

        return view('admin.surah_audio.upload', compact('reciter'));
    }
}
