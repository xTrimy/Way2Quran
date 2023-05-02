<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\Reciter;
use App\Models\Surah;
use App\Models\SurahAudio;
use App\Models\SurahAudioSegment;
use App\View\Components\SurahAudio as ComponentsSurahAudio;
use App\View\Components\SurahText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class PagesController extends Controller
{
    public function surah($surah_name,$reciter = null,$text_only = false, $audio_only = false)
    {
        $surah = Surah::where('name', $surah_name)->with('surah_audio', function ($q) {
            $q->first();
        })->first();

        if (!$surah) {
            return redirect()->route('home');
        }

        $ayah = Ayah::where('surah_id', $surah->id)->orderBy('ayah_count', 'ASC')->get();
        if ($text_only) {
            return view('surah_text', ['surah' => $surah, 'ayah' => $ayah]);
        }
        if ($audio_only) {
            return view('surah_audio', ['surah' => $surah, 'ayah' => $ayah]);
        }

        if(!$reciter){
            $surah_audio = SurahAudio::where('surah_id', $surah->id)->first();
            if($surah_audio){
                $reciter = $surah_audio->reciter_id;
            }else{
                $reciter = null;
            }
        }else{
            $surah_audio = SurahAudio::where('surah_id', $surah->id)->where('reciter_id', $reciter)->first();
        }
        if($reciter != null){
            $reciter = Reciter::find($reciter);
        }else{
            $reciter = Reciter::first();
            return redirect()->route('surah', ['surah_name' => $surah_name, 'reciter' => $reciter->id]);
        }

        $surahs = Surah::all();
        $reciters = $surah->reciters()->distinct()->get();
        return view('surah', ['surah' => $surah, 'ayah' => $ayah, 'reciter' => $reciter, 'surahs' => $surahs, 'reciters' => $reciters, 'surah_audio' => $surah_audio]);

    }
    public function surah_text($surah_name)
    {
        return $this->surah($surah_name,null, true, false);
    }
    public function surah_audio($surah_name)
    {
        return $this->surah($surah_name, null, false, true );
    }

    public function surah_s($surah_name)
    {
        $surah_name = str_replace("-", " ", trim($surah_name, " "));
        $surah = Surah::where('name', $surah_name)->with('surah_audio', function ($q) {
            $q->first();
        })->first();
        if (!$surah) {
            return redirect()->route('home');
        }
        
        $ayah = Ayah::where('surah_id', $surah->id)->orderBy('ayah_count', 'ASC')->get();
        return view('surah_segmenting', ['surah' => $surah, 'ayah' => $ayah]);
    }
    public function surah_s_action(Request $request)
    {
        $audio_id = $request->audio_id;
        for($i=0; $i<count($request->ayah_id);$i++){
            $time = $request->time[$i];
            $ayah_id = $request->ayah_id[$i];
            $segment = new SurahAudioSegment;
            $segment->start_at = $time;
            $segment->ayah_id = $ayah_id;
            $segment->surah_audio_id = $audio_id;
            $segment->save();
        }
    }

    public function get_file_chunks($reciter,$file_path)
    {
        $file = "Quran/" . $reciter . "/" . $file_path;
        $extension = "mp3";
        $mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";
        $file = Storage::disk('public')->path($file);
        if (file_exists($file)) {
            header("Content-type: {$mime_type}");
            header("Accept-Ranges: bytes");
            header('Content-Length: ' . filesize($file));
            header('Content-Range: 0-' . (filesize($file)-1) . '/' . filesize($file));
            header('Content-Disposition: filename="' . $file_path);
            header('X-Pad: avoid browser bug');
            header('Cache-Control: no-cache');
            header('Content-Transfer-Encoding: binary');
            header('Connection: close');

            $fp = fopen($file, 'rb');
            fpassthru($fp);
            exit;
            
        } else {
            header("HTTP/1.0 404 Not Found");
            return response()->json(['error' => 'File not found'], 404);
        }

    }
}
