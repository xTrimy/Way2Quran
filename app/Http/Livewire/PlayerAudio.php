<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PlayerAudio extends Component
{

    public $surah_audio;
    public $surah;
    public $reciter;
    public function mount($surah_audio, $surah)
    {
        $this->surah_audio = $surah_audio;
        // get first before / 
        $this->reciter = substr($this->surah_audio, 0, strrpos($this->surah_audio, '/'));
        $this->surah_audio = substr($this->surah_audio, strrpos($this->surah_audio, '/') + 1);
        $this->surah = $surah;
    }

    public function render()
    {
        return view('livewire.player-audio');
    }
}
