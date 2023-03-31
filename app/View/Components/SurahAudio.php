<?php

namespace App\View\Components;

use App\Models\Surah;
use Illuminate\View\Component;

class SurahAudio extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $surah;
    public $reciter;
    public function __construct($surah,$reciter)
    {
        $this->surah = $surah;
        $this->reciter = $reciter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $previous_surah = Surah::where('id', '<', $this->surah->id)->orderBy('id', 'DESC')->first();
        $next_surah = Surah::where('id', '>', $this->surah->id)->orderBy('id', 'ASC')->first();
        return view('components.surah-audio', ['surah' => $this->surah, 'previous_surah' => $previous_surah, 'next_surah' => $next_surah, 'reciter' => $this->reciter]);
    }
}
