<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SurahText extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $surah;
    public $ayah;
    public function __construct($surah, $ayah)
    {
        $this->surah = $surah;
        $this->ayah = $ayah;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $western_arabic = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $eastern_arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        return view('components.surah-text', ['surah' => $this->surah, 'ayah' => $this->ayah, 'western_arabic' => $western_arabic, 'eastern_arabic' => $eastern_arabic]);
    }
}
