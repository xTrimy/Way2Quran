<?php

namespace App\Http\Livewire;

use App\Models\Surah;
use App\Models\SurahAudio;
use Livewire\Component;

class Player extends Component
{

    public $surah;
    public $surah_audio;
    public $reciter;
    public $next_surah;
    public $prev_surah;
    public $show;
    protected $listeners = ['playAudio' => 'play'];

    public function mount($surah = null, $reciter = null, $show=false)
    {
        $this->show = $show;
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
        
        $this->reciter = $this->surah_audio->reciter_model;

        if($this->surah == null){
            $this->surah = $this->surah_audio->surah;
        }
        $this->next_surah = $this->surah->next_surah();
        $this->prev_surah = $this->surah->prev_surah();

        
    }

    public function play($surah_audio_id, $reciter_id = null, $surah_id = null){
        if($surah_audio_id != null){
            $this->surah_audio = SurahAudio::find($surah_audio_id);
        }
        else{
            $this->surah_audio = SurahAudio::where('reciter_id', $reciter_id)->where('surah_id', $surah_id)->first();
            if($this->surah_audio == null){
                $this->surah_audio = SurahAudio::where('surah_id', $surah_id)->first();
            }
        }
        if($this->surah_audio == null){
            $this->surah_audio = SurahAudio::first();
        }
        $this->surah = $this->surah_audio->surah;
        $this->reciter = $this->surah_audio->reciter_model;

        if ($this->surah == null) {
            $this->surah = $this->surah_audio->surah;
        }
        $this->next_surah = $this->surah->next_surah();
        $this->prev_surah = $this->surah->prev_surah();
        $this->show = true;
        $this->dispatchBrowserEvent('contentChanged');

    }



    public function render()
    {
        if($this->show)
            return view('livewire.player');
        else{
            return <<<'blade'
            <div>
            </div>
        blade;
        }
    }
}
