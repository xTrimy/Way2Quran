<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurahAudio extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'surah_id',
    ];

    public function surah(){
        return $this->belongsTo(Surah::class);
    }
    
    public function scopeReciter($query, $reciter)
    {
        return $query->where('reciter', $reciter);
    }

    public function segments()
    {
        return $this->hasMany(SurahAudioSegment::class);
    }

    public function reciter_model()
    {
        return $this->belongsTo(Reciter::class, 'reciter_id', 'id', 'reciters', 'reciter');
    }

    public function getFile(){
        $reciter = substr($this->path, 0, strrpos($this->path, '/'));
        $surah_audio = substr($this->path, strrpos($this->path, '/') + 1);
        return [
            'reciter' => $reciter,
            'surah_audio' => $surah_audio,
        ];
    }

}
