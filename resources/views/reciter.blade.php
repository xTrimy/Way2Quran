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
            <div class="bg-neutral-800 rounded-2xl lg:px-8 px-4 py-4 flex lg:flex-nowrap flex-wrap">
              <div class="flex lg:space-x-8 space-x-4">
                <div class="w-24 h-24 overflow-hidden rounded-full">
                  <img src="{{ asset($reciter->image) }}" class="w-full h-full object-cover" alt="">
                </div>
                <div class="text-white flex-1">
                  <h1 class="text-2xl">
                    {{ $reciter->name_en }}
                  </h1>
                  <p class="max-w-4xl text-lg">
                    {{ $reciter->bio_en?? $reciter->bio_ar?? " This reciter has no bio yet" }}
                  </p>
                </div>
              </div>
              <div class="flex-grow flex lg:w-auto w-full justify-end lg:ml-2">
                <div class=" h-full flex flex-col justify-center space-y-2 lg:w-56 w-full lg:mt-0 mt-4">
                  <a href="#" class="w-full flex space-x-3 items-center justify-center rounded-lg px-6 py-4 bg-neutral-750 hover:bg-neutral-700 text-green-500 text-center">
                    <i class="las la-download text-2xl"></i>
                    <p>
                      Download All
                    </p>
                  </a>
                  <button onclick="open_share_modal()" class="w-full flex space-x-3 items-center justify-center rounded-lg px-6 py-4 bg-neutral-750 hover:bg-neutral-700 text-green-500 text-center">
                    <i class="las la-share text-2xl"></i>
                    <p>
                      Share
                    </p>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <livewire:surahs :reciter="$reciter->id" />
        </div>
      </div>
    </div>
    <div id="surah_audio_container">
    </div>
   
@endsection