<div class="surah p-5 max-w-7xl w-full mx-auto text-center pb-72" id="surah-text" data-surahName="{{ $surah->name }}">  
    <button id="play_current_surah" onclick="play_current_surah('{{ route('surah_audio',$surah->name) }}')">
        <i class="las la-play"></i>
    </button>  
    <div class="w-90 max-w-full h-14 mb-8">
        <img src="{{ asset('images/بسم-الله-الرحمن-الرحيم.png') }}" class="w-full h-full object-contain object-center {{ ($surah->surah_order == 1 || $surah->surah_order == 9)?"hidden":"" }}" alt="">
    </div>
    @foreach ($ayah as $a)
        <span class="ayah inline group relative cursor-pointer text-white hover:bg-neutral-700" id="ayah-{{ $a->id }}">
                <span class="z-30 relative ">{{ $a->ayah }}</span>
            {{-- <div class="hidden group-hover:block absolute left-1/2 bottom-1/2 transform -translate-x-1/2 -translate-y-1/2 z-40 -mt-4  py-2 px-6 bg-gray-500 ">
                <i class="las la-play"></i>
            </div> --}}
        </span>
        <span class="inline  text-white"> {{ str_replace($western_arabic, $eastern_arabic, $a->ayah_count) }}</span>
    @endforeach
</div>