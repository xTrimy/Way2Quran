<?php

namespace App\Http\Livewire;

use App\Models\Surah;
use Livewire\Component;

class Player extends Component
{

    public $surah;
    public $surah_audio;

    public function mount($surah = null, $reciter = null)
    {
        if($surah == null) {
            $this->surah = Surah::first();
        } else {
            $this->surah = $surah;
        }

        if($reciter == null) {
            $this->surah_audio = $this->surah->surah_audio()->first();
        } else {
            $this->surah_audio = $this->surah->surah_audio()->where('reciter_id', $reciter)->first();
        }

    }


    public function render()
    {
        return view('livewire.player');
    }
}
