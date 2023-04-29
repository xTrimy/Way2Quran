<?php

namespace App\Http\Livewire;

use App\Models\Surah;
use App\Models\SurahAudio;
use Livewire\Component;

class Surahs extends Component
{
    public $surahs;
    public $surahs_all;
    public $showMore = false;
    public $reciter = null;
    protected $listeners = ['showMoreOrLess' => 'showMoreOrLess'];

    public function mount(){
        if($this->reciter){
            // get surahs which has surah_audio for this reciter
            $this->surahs = Surah::whereHas('surah_audio', function($query){
                $query->where('reciter_id', $this->reciter);
            })->limit(5)->get();
            $this->surahs_all = Surah::whereHas('surah_audio', function($query){
                $query->where('reciter_id', $this->reciter);
            })->get();

        }else{
            $this->surahs = Surah::limit(5)->get();
            $this->surahs_all = Surah::all();
        }
    }

    public function showMore(){
        $this->showMore = true;
        $this->surahs = $this->surahs_all;
    }

    public function showLess(){
        $this->surahs = Surah::limit(5)->get();
    }

    public function showMoreOrLess(){
        if($this->showMore){
            $this->showLess();
            $this->showMore = false;
        }else{
            $this->showMore();
            $this->showMore = true;
        }
    }


    public function render()
    {
        return view('livewire.surahs');
    }
}
