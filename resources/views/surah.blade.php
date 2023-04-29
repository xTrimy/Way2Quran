@extends('layouts.app')
@section('page')
surah
@endsection
@section('title')
{{ $surah->name }}
@endsection
@section('content')
<div class="w-full flex lg:flex-row flex-col items-center side-paddings bg-neutral-900">
    <div class="flex-grow lg:py-8 py-2 side-paddings lg:text-left text-center">
        <button type="button" class="text-neutral-400 mb-4 group relative">
            Surah <i class="las la-caret-down"></i>
        <div class="z-50 max-h-96 overflow-y-scroll hidden group-focus-within:block absolute left-1/2 top-full transform -translate-x-1/2 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                @foreach ($surahs as $s)
                    <li>
                        <a href="{{ route('surah',['surah_name'=>$s->name, 'reciter'=>$reciter->id??null]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ $s->surah_order }}-{{ $s->name_en }}
                        </a>
                    </li>                    
                @endforeach
            </ul>
        </div>
        </button>
                <!-- Dropdown menu -->
       
        <h1 class="lg:text-2xl text-lg font-bold text-primary-500">
            <div>
                {{ $surah->name_en }}
            </div>
            <div>
                {{ $surah->name }}
            </div>
        </h1>
    </div>
    <div class="lg:h-24 h-0 lg:w-0 w-full lg:border-l lg:border-b-0 border-b border-neutral-700 bg-neutral-500"></div>
    <div class="flex-grow lg:py-8 py-2 side-paddings lg:text-left text-center">
        <button type="button" class="text-neutral-400 mb-4 group relative">
            Reciter <i class="las la-caret-down"></i>
        <div class="z-50 max-h-96 overflow-y-scroll hidden group-focus-within:block absolute left-1/2 top-full transform -translate-x-1/2 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                @foreach ($reciters as $r)
                    <li>
                        <a href="{{ route('surah',['surah_name'=>$surah->name, 'reciter'=>$r->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ $r->name_en }}
                        </a>
                    </li>                    
                @endforeach
            </ul>
        </div>
        </button>
        <h1 class="lg:text-2xl text-lg font-bold text-primary-500">
            <div>
                {{ $reciter->name_en??"N/A" }}
            </div>
            <div>
                {{ $reciter->name??"N/A" }}
            </div>
        </h1>
    </div>
</div>
<div class="side-paddings">
    <div class="w-full flex flex-wrap my-4 side-paddings">
        <button id="surah_play_pause_button" class="rounded-full mr-4 mb-2 text-green-500 flex items-center py-1 pl-4 pr-8 text-lg border border-green-500">
            <i class="las la-play text-2xl mr-4"></i> Play 
        </button>
        <livewire:love-button :key="$surah->id.$reciter->id"  :surah="$surah" :reciter="$reciter" />
        <button onclick="open_share_modal()" class="rounded-full mb-2 text-neutral-400 flex items-center py-1 pl-4 pr-8 text-lg border border-neutral-400">
            <i class="las la-share text-2xl mr-4"></i> Share 
        </button>
        @if($surah_audio)
            <a download="" href="{{ route('get_file_chunks',['file_path'=>$surah_audio->getFile()['surah_audio'], 'reciter'=>$surah_audio->getFile()['reciter']]) }}" class="rounded-full mr-4 mb-2 text-neutral-400 flex items-center py-1 pl-4 pr-8 text-lg border border-neutral-400">
                <i class="las la-download text-2xl mr-4"></i> Download 
            </a>
        @endif
    </div>
</div>
<div id="surah_text_container">
    <x-surah-text :surah="$surah" :ayah="$ayah" />
</div>
<script>
    // load event
    window.addEventListener('load', function() {
        setTimeout(() => {
            Livewire.emit('playAudio', null, {{ $reciter->id??null }}, {{ $surah->id }})
        }, 500);
    });
</script>
@endsection