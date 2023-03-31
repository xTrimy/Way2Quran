@extends('layouts.app')
@section('page')
reciter
@endsection
@section('title')
{{ $reciter->name }}
@endsection
@section('content')
    <div class="wrapper w-full h-full pb-4" style="--tw-bg-opacity:0.5">
      <div class="px-8">
        <div class="side-paddings">
          <div class="w-full py-16">
            <div class="bg-neutral-800 rounded-2xl px-8 py-4 flex space-x-8">
              <div class="w-24 h-24 overflow-hidden rounded-full">
                <img src="{{ asset($reciter->image) }}" class="w-full h-full object-cover" alt="">
              </div>
              <div class="text-white">
                <h1 class="text-2xl">
                  {{ $reciter->name_en }}
                </h1>
                <p class="max-w-4xl text-lg">
                  {{ $reciter->bio_en?? $reciter->bio_ar?? " This reciter has no bio yet" }}
                </p>
              </div>
              <div class="flex-grow flex justify-end">
                <div class="w-48 h-full flex flex-col justify-between space-y-2">
                  <a href="#" class="w-full flex-grow flex space-x-3 items-center justify-center rounded-lg px-4 py-3 bg-neutral-750 hover:bg-neutral-700 text-green-500 text-center">
                    <i class="las la-download text-2xl"></i>
                    <p>
                      Download All
                    </p>
                  </a>
                  <a href="#" class="w-full flex-grow flex space-x-3 items-center justify-center rounded-lg px-4 py-3 bg-neutral-750 hover:bg-neutral-700 text-green-500 text-center">
                    <i class="las la-share text-2xl"></i>
                    <p>
                      Share
                    </p>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <livewire:surahs />
        </div>
      </div>
    </div>
    <div id="surah_audio_container">
    </div>
   
@endsection