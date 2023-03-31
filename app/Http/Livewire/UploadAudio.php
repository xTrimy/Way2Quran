<?php

namespace App\Http\Livewire;

use App\Models\Reciter;
use App\Models\Surah;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class UploadAudio extends Component
{
    use WithFileUploads;

    public $audio = [];
    public $success_uploads = [];
    public $reciter;
    public $success = false;
    public $upload_finished = false;
    public $listeners = [ 'upload:finished' => 'finished' ];
    public $surahs = [];
    // public function uploadErrored($name, $errorsInJson, $isMultiple)
    // {
    //     dd($errorsInJson);
    // }
    public function mount($reciter)
    {
        $this->reciter = $reciter;
        $this->surahs = Surah::all();
    }

    public function updatedAudio(){
        $this->validate([
            'audio.*' => 'mimes:mp3'
        ]);
    }

    public function finished()
    {
        $this->upload_finished = true;
    }

    public function remove($index)
    {
        unset($this->audio[$index]);
        $this->audio = array_values($this->audio);
    }

    public function save()
    {
        $this->validate([
            'audio.*' => 'mimes:mp3'
        ]);
        $reciter = Reciter::find($this->reciter)->first();
        foreach ($this->audio as $audio) {
            // store in public folder
            $audio->storeAs('public/Quran/' . $reciter->slug, $audio->getClientOriginalName());
            $surah = Surah::where('surah_order', (int)explode('-', $audio->getClientOriginalName())[0])->first();
            $reciter->surah_audio()->create([
                'surah_id' => $surah->id,
                'path' => $reciter->slug . '/' . $audio->getClientOriginalName()
            ]);
            $this->success_uploads[] = $audio;
        }
        $this->audio = [];
        $this->upload_finished = false;
        
        // $this->success = true;
    }

    public function render()
    {
        return view('livewire.upload-audio');
    }
}
