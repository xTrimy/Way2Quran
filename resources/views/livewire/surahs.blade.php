<div>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl text-white">
            Surahs
        </h2>
        <button class="text-green-500 hover:underline text-xl">
            See All
        </button>
    </div>
    <hr class="border border-neutral-500 my-4">
    @foreach ($surahs as $surah)
        <div class="flex xl:flex-nowrap flex-wrap justify-between xl:space-y-0 space-y-2">
            <a href="{{ route('surah', ['surah_name'=>$surah->name, 'reciter'=>$reciter]) }}" class="bg-neutral-750 hover:bg-neutral-700 rounded-xl text-primary-500 flex items-center space-x-4 lg:space-x-16 px-8 xl:max-w-3xl  w-full py-2">
                <div class="text-3xl">
                  {{ $surah->surah_order }}
                </div>
                <div class="text-xl">
                  <p>{{ $surah->name_en }}</p>
                  <p>{{ $surah->name }}</p>
                </div>
            </a>
            <div class="flex xl:space-x-4 space-x-1 xl:w-auto xl:flex-nowrap flex-wrap w-full">
                <button type="button" 
                @if($reciter == null)
                wire:click="$emit('playAudio', null, null, {{ $surah->id }})" 
                @else
                wire:click="$emit('playAudio', null, {{ $reciter }}, {{ $surah->id }})" 
                @endif                  
                  data-id="{{ $surah->id }}" data-reciter="{{ $reciter }}" class="listen bg-neutral-750 hover:bg-neutral-700 rounded-xl text-green-500 flex items-center justify-center space-x-4 xl:px-12 px-4 flex-1 mb-1 py-2">
                  <i class="las la-headphones text-2xl"></i>
                  <div class="text-lg">
                    <p>Listen</p>
                  </div>
                </button>
                @if($surah->getSurahAudioByReciterId($reciter))
                  <a href="{{ route('get_file_chunks',['reciter'=>$surah->getSurahAudioByReciterId($reciter)->getFile()['reciter'],'file_path'=>$surah->getSurahAudioByReciterId($reciter)->getFile()['surah_audio']]) }}" class="bg-neutral-750 hover:bg-neutral-700 rounded-xl text-green-500 flex items-center justify-center space-x-4 xl:px-12 px-4 flex-1 mb-1 py-2">
                    <i class="las la-download text-2xl"></i>
                    <div class="text-lg">
                      <p>Download</p>
                    </div>
                  </a>
                @else
                  <button type="button" disabled class="bg-neutral-750 rounded-xl text-green-500 opacity-50 flex items-center justify-center space-x-4 xl:px-12 px-4 flex-1 mb-1 py-2">
                    <i class="las la-download text-2xl"></i>
                    <div class="text-lg">
                      <p>Download</p>
                    </div>
                  </button>
                @endif
                <button onclick="open_share_modal('{{ urldecode(route('surah', ['surah_name'=>$surah->name, 'reciter'=>$reciter])) }}')" class="bg-neutral-750 hover:bg-neutral-700 rounded-xl text-green-500 flex items-center justify-center space-x-4 xl:px-12 px-4 flex-1 mb-1 py-2">
                    <i class="las la-share text-2xl"></i>
                    <div class="text-lg">
                    <p>Share</p>
                    </div>
                </button>
            </div>
        </div>
    <hr class="border border-neutral-500 my-4">
    @endforeach
    <button wire:click="$emit('showMoreOrLess')" class="bg-neutral-700 text-xl mx-auto hover:bg-neutral-600 rounded-xl text-green-500 flex items-center justify-center space-x-4 px-16 py-2">
        <div wire:loading.remove>
            {{ $showMore ? 'Show Less' : 'Show More'  }}
        </div>
        <div wire:loading>
            Loading...
        </div>
    </button>
    <script>
      
    </script>
</div>
