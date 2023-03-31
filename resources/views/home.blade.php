@extends('layouts.app')
@section('page')
home
@endsection
@section('title')
Home
@endsection
@section('content')
    <div class="wrapper w-full h-full pb-4" style="--tw-bg-opacity:0.5">
        {{-- <div class="background-animation"></div> --}}
        <div class="flex items-center h-full relative justify-center bg-neutral-900 py-24" id="hero">
          <div class="absolute bottom-0 right-0">
            <img src="{{ asset('vectors/hero-bg.svg') }}" alt="">
          </div>
          <div class="flex flex-col mr-16 relative z-10">
              <div class="text-5xl text-left text-neutral-100 font-bold">{{ __('Welcome to Way2Quran') }}</div>
              <div class="text-4xl text-left text-neutral-100 ">{{ __('The best place to learn Quran') }}</div>
              <div class="text-3xl text-left text-neutral-100 mt-4 ">{{ __('Listen to Quran recitations') }}</div>
              <div class="text-3xl text-left text-neutral-100 ">{{ __('from the best reciters') }}</div>
              <div class="flex space-x-2">
                <button class="bg-transparent border border-green-400 hover:bg-neutral-700 transition-colors text-green-400 px-24 py-2 rounded-xl mt-4">{{ __('Listen Now') }}</button>
                <button class="bg-transparent border border-neutral-400 hover:bg-neutral-700 transition-colors text-neutral-400 px-24 py-2 rounded-xl mt-4">{{ __('Browse Reciters') }}</button>
              </div>
          </div>
           
           
            <div class="w-84 h-84 ml-16">
                <img src="{{ asset('images/logo-original.png') }}" class="w-full h-full object-contain" alt="Way2Quran Hero" >
            </div>
        </div>
        <div class="px-8">
          <div class="side-paddings mt-8">
          <h2 class="text-3xl text-white">
            Featured Reciters
          </h2>
          <hr class="border border-neutral-500 my-4">
          <div class="flex justify-between">
            <p class="text-white text-lg">
              Expertly curated playlists of the world's best voice of the moment
            </p>
            <button class="text-green-500 hover:underline text-xl">
                See All
            </button>
          </div>
         <div class="w-full h-44 px-9">
            <div id="splide" class="splide w-full h-full">
            <div class="splide__track w-full h-full">
              <ul class="splide__list w-full">
                @for ($i=0; $i<20; $i++)
                  <li class="splide__slide w-full">
                  <div class="p-2 w-full">
                    <div class="py-3 px-6 rounded-2xl w-full bg-neutral-700 flex space-x-2 items-center" style="--tw-bg-opacity:0.5">
                      <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="{{ asset('images/logo-original.png') }}" class="bg-neutral-600 w-full h-full object-cover" alt="">
                      </div>
                      <div>
                        <p class="text-xl text-primary-500">Mukhtar Al Hajj</p>
                        <p class="text-lg text-white">Go to playlist</p>
                      </div>
                    </div>
                  </div>
                </li>
                @endfor
              </ul>
            </div>
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev" type="button" aria-controls="splide-track" aria-label="Previous slide">
                  <i class="las la-arrow-left"></i>
                </button>
                <button class="splide__arrow splide__arrow--next" type="button" aria-controls="splide-track" aria-label="Next slide">
                  <i class="las la-arrow-right"></i>
                </button>
            </div>
          </div>
          </div>
          <livewire:surahs />
        </div>
        </div>

    </div>
    
    <div id="surah_audio_container">
    </div>
    <script>
VANTA.HALO({
  el: ".background-animation",
  mouseControls: false,
  touchControls: false,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  baseColor: 0xe88700,
  backgroundColor: 0x343434,
  amplitudeFactor: 0,
  xOffset: -0.01,
  size: 1
})
</script>
{{-- @vite('resources/js/app.js') --}}
   
<script>
  document.addEventListener( 'DOMContentLoaded', function () {
  new Splide('#splide', {
    type: 'loop',
    perPage: 3,
    focus: 'center',
    autoplay: true,
    interval: 8000,
    flickMaxPages: 3,
    updateOnMove: true,
    pagination: false,
    padding: '0%',
    throttle: 300,
    breakpoints: {
      1440: {
        perPage: 1,
        padding: '30%'
      }
    }
  }).mount();
});
</script>
@endsection