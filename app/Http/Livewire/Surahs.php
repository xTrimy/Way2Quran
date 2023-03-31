<?php

namespace App\Http\Livewire;

use App\Models\Surah;
use Livewire\Component;

class Surahs extends Component
{
    public $surahs;
    public $surahs_all;
    public $showMore = false;
    protected $listeners = ['showMoreOrLess' => 'showMoreOrLess'];

    public function mount(){
        $surahs = Surah::limit(5)->get();
        $this->surahs = $surahs;
        $surahs = Surah::all();
        $this->surahs_all = $surahs;
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
