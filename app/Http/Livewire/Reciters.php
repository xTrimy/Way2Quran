<?php

namespace App\Http\Livewire;

use App\Models\Reciter;
use Livewire\Component;

class Reciters extends Component
{

    public $reciters;

    public function mount()
    {
        $this->reciters = Reciter::all();
    }
    

    public function render()
    {
        return view('livewire.reciters');
    }
}
