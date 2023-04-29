<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    use HasFactory;
    protected $table = "surah";
    protected $fillable = [
        'name',
        'ayah_count',
        'surah_order',
    ];
    public function surah_audio()
    {
        return $this->hasMany(SurahAudio::class);
    }
    
    public function ayat(){
        return $this->hasMany(Ayah::class);
    }

    // reciters that have recited this surah
    public function reciters(){
        return $this->belongsToMany(Reciter::class, 'surah_audio', 'surah_id', 'reciter_id');
    }

    public function next_surah(){
        $surah = Surah::where('surah_order', $this->surah_order + 1)->first();
        if($surah == null){
            $surah = Surah::first();
        }
        return $surah;
    }

    public function prev_surah(){
        $surah = Surah::where('surah_order', $this->surah_order - 1)->first();
        if($surah == null){
            $surah = Surah::orderBy('surah_order', 'desc')->first();
        }
        return $surah;
    }
    
    public function getSurahAudioByReciterId($reciter_id){
        if($reciter_id == null){
            return $this->surah_audio()->first();
        }
        return $this->surah_audio()->where('reciter_id', $reciter_id)->first();
    }
}
