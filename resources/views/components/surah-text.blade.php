<div class="surah p-5 max-w-7xl w-full mx-auto text-center pb-72" id="surah-text" data-surahName="{{ $surah->name }}">  

    <template x-if="dark">
        <div class="w-90 max-w-full h-14 mb-8 dark:hid">
            <img src="{{ asset('images/بسم-الله-الرحمن-الرحيم-white.png') }}" class="w-full h-full object-contain object-center {{ ($surah->surah_order == 1 || $surah->surah_order == 9)?"hidden":"" }}" alt="">
        </div>
    </template>
    <template x-if="!dark">
        <div class="w-90 max-w-full h-14 mb-8 dark:hid">
            <img src="{{ asset('images/بسم-الله-الرحمن-الرحيم.png') }}" class="w-full h-full object-contain object-center {{ ($surah->surah_order == 1 || $surah->surah_order == 9)?"hidden":"" }}" alt="">
        </div>
    </template>
    @foreach ($ayah as $a)
        <span class="ayah inline group relative dark:text-white" id="ayah-{{ $a->id }}">
                <span class="z-30 relative ">{{ $a->ayah }}</span>
        </span>
        <span class="inline  dark:text-white"> {{ str_replace($western_arabic, $eastern_arabic, $a->ayah_count) }}</span>
    @endforeach
</div>