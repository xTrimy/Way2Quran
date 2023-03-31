@extends('layouts.app')
@section('page')
reciters
@endsection
@section('title')
All Reciters
@endsection
@section('content')
    <div class="wrapper w-full h-full pb-4" style="--tw-bg-opacity:0.5">

        <div class="px-8 py-8">
          <div class="side-paddings">
          <h2 class="text-2xl text-white">
            All Reciters
          </h2>
          
          <livewire:reciters />
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