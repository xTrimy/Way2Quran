@php
    $page = app()->view->getSections()['page'] ?? null;
    $page = rtrim($page);
@endphp

<!DOCTYPE html>
<html lang="en">
<head class="w-full h-full">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js" integrity="sha512-334uBDwY0iZ2TklV1OtDtBW9vp7jjP7SWRzT7Ehu1fdtPIjTpCwTSFb8HI/YBau9L1/kRBEOALrS229Kry4yFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanta/0.5.24/vanta.halo.min.js" integrity="sha512-gRIqup64NLSGaR/I3X+mtgekcMOf9mQhmA4dKplXPYpXRUyV3ToH35BE5ftKCHNgWyFb4pMiQzeBEXqXrd4JSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.6/dist/js/splide.min.js
"></script>
    @livewireStyles

{{-- @vite('resources/css/app.css') --}}
<link rel="stylesheet" href="{{ asset('build/assets/app-070b8e4a.css') }}">
<link href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css
" rel="stylesheet">

    <title>@yield('title') | Way2Quran</title>
</head>
<body class='font-changa bg-dark-500 w-full h-full' dir="ltr">
   
    <div id="site" class="p-8 pb-24 overflow-hidden">
    <x-header page="{{ $page }}" />
    @yield('content')
    <div class="fixed bottom-0 left-0 w-full z-50 px-8 ">
        <div class="border-t border-neutral-700 relative">
            <button id="show_hide_player" class="absolute cursor-pointer bottom-full right-12 bg-dark-500 w-8 h-8 rounded-t-md border-t border-l border-r border-neutral-700 flex justify-center items-center">
                <i class="las la-arrow-down text-neutral-600"></i>
            </button>
            <div id="player_container" class="overflow-hidden max-h-48  transition-all">
                <livewire:player />
            </div>
            </div>
            <script>
            document.getElementById('show_hide_player').addEventListener('click', function(){
                let playerContainer = document.getElementById('player_container');
                let showHidePlayer = document.getElementById('show_hide_player');
                if(playerContainer.classList.contains('max-h-0')){
                playerContainer.classList.remove('max-h-0');
                playerContainer.classList.add('max-h-48');
                showHidePlayer.innerHTML = '<i class="las la-arrow-down text-neutral-600"></i>';
                }else{
                playerContainer.classList.add('max-h-0');
                playerContainer.classList.remove('max-h-48');
                showHidePlayer.innerHTML = '<i class="las la-arrow-up text-neutral-600"></i>';
                }
            })
            </script>
        </div>
    </div>
    @livewireScripts
</body>
</html>
