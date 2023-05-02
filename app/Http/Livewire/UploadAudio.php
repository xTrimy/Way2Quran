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
    public $listeners = [ 'upload:finished' => 'finished', 'save' => 'save' ];
    public $surahs = [];
    public $progress = 0;

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
        // // get mime type
        // $this->validate([
        //     'audio.*' => 'mimetypes:audio/mpeg, audio/ogg, audio/wav, audio/x-wav, audio/mp3, audio/x-m4a'
        // ]);
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
        $reciter = Reciter::find($this->reciter)->first();
        foreach ($this->audio as $audio) {
            // store in public folder
            $audio_mimes = ['audio/mpeg', 'audio/ogg', 'audio/wav', 'audio/x-wav', 'audio/mp3', 'audio/x-m4a'];
            if(in_array($audio->getMimeType(), $audio_mimes)){
                $audio->storeAs('public/Quran/' . $reciter->slug, $audio->getClientOriginalName());
                $surah = Surah::where('surah_order', (int)explode('-', $audio->getClientOriginalName())[0])->first();
                $reciter->surah_audio()->create([
                    'surah_id' => $surah->id,
                    'path' => $reciter->slug . '/' . $audio->getClientOriginalName()
                ]);
                $this->success_uploads[] = $audio;
            }else if($audio->getMimeType() == 'application/zip'){
                $zip = new \ZipArchive;
                $res = $zip->open($audio->getRealPath());
                if ($res === TRUE) {
                    $zip->extractTo(storage_path('app/public/Quran/' . $reciter->slug));
                    $zip->close();
                    $files = scandir(storage_path('app/public/Quran/' . $reciter->slug));
                    foreach ($files as $file) {
                        if($file != '.' && $file != '..'){
                            $surah = Surah::where('surah_order', (int)explode('-', $file)[0])->first();
                            // check if surah_audio exists
                            if($reciter->surah_audio()->where('surah_id', $surah->id)->exists()){
                                $reciter->surah_audio()->where('surah_id', $surah->id)->delete();
                            }
                            $reciter->surah_audio()->create([
                                'surah_id' => $surah->id,
                                'path' => $reciter->slug . '/' . $file
                            ]);
                        }
                    }
                    // delete zip file
                    unlink($audio->getRealPath());
                    $this->dispatchBrowserEvent('upload:finished', ['message' => 'Upload finished.']);
                } else {
                    $this->addError('audio', 'The zip file is not valid.');
                }
            }else{
                $this->addError('audio', 'The file type is not valid.');
            }
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
