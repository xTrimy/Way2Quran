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
            <div class="bg-light-500 dark:bg-neutral-800 rounded-2xl lg:px-8 px-4 py-4 flex lg:flex-nowrap flex-wrap">
              <div class="flex lg:space-x-8 space-x-4">
                <div class="w-24 h-24 overflow-hidden rounded-full">
                  <img src="{{ asset($reciter->image) }}" class="w-full h-full object-cover" alt="">
                </div>
                <div class="dark:text-white flex-1">
                  <h1 class="text-2xl">
                    {{ $reciter->name_en }}
                  </h1>
                  @php
                    $bio = $reciter->bio_en?? $reciter->bio_ar?? " This reciter has no bio yet";
                    $max_bio_length = 64;
                    // trim the string to the maximum length but don't cut off the last word
                    $bio_short = substr($bio, 0, $max_bio_length);
                    $bio_short = substr($bio_short, 0, strrpos($bio_short, ' ')); 
                  @endphp
                  <div class="max-w-4xl text-lg" data-full="false" data-bio_short="{{ $bio_short }}" data-bio_full="{{ $bio }}">
                    @if(strlen($bio) > $max_bio_length)
                      <p class="inline">
                        {{ $bio_short }}...
                      </p>
                      <button type="button" class="text-primary-500 hover:underline" onclick="bio(this)">Read More</button>
                      <script>
                        bio = (el)=>{
                        let bio = el.parentElement;
                        let bio_text = bio.querySelector('p');
                        let bio_btn = bio.querySelector('button');
                        let bio_full = bio.getAttribute('data-bio_full');
                        let bio_short = bio.getAttribute('data-bio_short');
                        let bio_full_status = bio.getAttribute('data-full');
                        if(bio_full_status == 'false'){
                          bio_text.innerText = bio_full;
                          bio_btn.innerText = 'Read Less';
                          bio.setAttribute('data-full','true');
                        }else{
                          bio_text.innerText = bio_short + '...';
                          bio_btn.innerText = 'Read More';
                          bio.setAttribute('data-full','false');
                        }
                      }
                      </script>
                    @else
                      {{ $bio }}
                    @endif
                  </div>
                </div>
              </div>
              <div class="flex-grow flex lg:w-auto w-full justify-end lg:ml-2 ">
                <div class=" h-full flex flex-col justify-center space-y-2 lg:w-56 w-full lg:mt-0 mt-4">
                  <a href="#" class="w-full flex space-x-3 items-center justify-center rounded-lg px-6 py-4 bg-light-700 hover:bg-light-800 dark:bg-neutral-750 dark:hover:bg-neutral-700 dark:text-green-500 text-green-600 text-center">
                    <i class="las la-download text-2xl"></i>
                    <p>
                      Download All
                    </p>
                  </a>
                  <button onclick="open_share_modal()" class="w-full flex space-x-3 items-center justify-center rounded-lg px-6 py-4 bg-light-700 hover:bg-light-800 dark:bg-neutral-750 dark:hover:bg-neutral-700 dark:text-green-500 text-green-600 text-center">
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