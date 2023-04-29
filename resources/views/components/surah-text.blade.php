<div class="surah p-5 max-w-7xl w-full mx-auto text-center pb-72" id="surah-text" data-surahName="{{ $surah->name }}">  

    <div class="w-90 max-w-full h-14 mb-8">
        <img src="{{ asset('images/بسم-الله-الرحمن-الرحيم.png') }}" class="w-full h-full object-contain object-center {{ ($surah->surah_order == 1 || $surah->surah_order == 9)?"hidden":"" }}" alt="">
    </div>
    @foreach ($ayah as $a)
        <span class="ayah inline group relative text-white" id="ayah-{{ $a->id }}">
                <span class="z-30 relative ">{{ $a->ayah }}</span>
        </span>
        <span class="inline  text-white"> {{ str_replace($western_arabic, $eastern_arabic, $a->ayah_count) }}</span>
    @endforeach
</div>