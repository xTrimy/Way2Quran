<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciter extends Model
{
    use HasFactory;

    public function surah_audio()
    {
        return $this->hasMany(SurahAudio::class);
    }

    public function surahs(){
        return $this->hasManyThrough(Surah::class, SurahAudio::class, 'reciter_id', 'id', 'id', 'surah_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
