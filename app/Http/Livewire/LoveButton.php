<?php

namespace App\Http\Livewire;

use App\Models\FavouriteSurah;
use Livewire\Component;

class LoveButton extends Component
{

    public $surah;
    public $reciter;
    public $added;
    public $icon_only;
    protected $listeners = ['love' => 'love'];
    public function mount($surah, $reciter, $icon_only = false)
    {
        $this->surah = $surah;
        $this->reciter = $reciter;
        $this->added = false;
        $this->icon_only = $icon_only;
        $favourite_surah = FavouriteSurah::where('ip', request()->ip())->where('surah_id', $this->surah->id)->where('reciter_id', $this->reciter->id)->first();
        if($favourite_surah != null){
            $this->added = true;
        }
    }

    public function love()
    {
        $favourite_surah = FavouriteSurah::where('ip', request()->ip())->where('surah_id', $this->surah->id)->where('reciter_id', $this->reciter->id)->first();
        if($this->added){
            if($favourite_surah == null){
                $this->added = false;
                return;
            }
            $favourite_surah->delete();
            $this->added = false;
        }
        else{
            if($favourite_surah != null){
                $this->added = true;
                return;
            }
            $favourite_surah = new FavouriteSurah();
            $favourite_surah->ip = request()->ip();
            $favourite_surah->surah_id = $this->surah->id;
            $favourite_surah->reciter_id = $this->reciter->id;
            $favourite_surah->save();
            $this->added = true;
        }
        $this->dispatchBrowserEvent('loveAdded', [$this->added, $this->surah->id, $this->reciter->id]);
    }

    public function render()
    {
        if($this->icon_only){
            return view('livewire.love-button2');
        }
        return view('livewire.love-button');
    }
}
