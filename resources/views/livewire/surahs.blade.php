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
        <div class="flex justify-between">
            <a href="#" class="bg-neutral-750 hover:bg-neutral-700 rounded-xl text-primary-500 flex items-center space-x-4 lg:space-x-16 px-8 xl:w-full max-w-3xl py-2">
                <div class="text-3xl">
                  {{ $surah->surah_order }}
                </div>
                <div class="text-xl">
                  <p>{{ $surah->name_en }}</p>
                  <p>{{ $surah->name }}</p>
                </div>
            </a>
            <div class="flex space-x-4">
                <a href="#" class="bg-neutral-750 hover:bg-neutral-700 rounded-xl text-green-500 flex items-center justify-center space-x-4 px-12 py-2">
                  <i class="las la-headphones text-2xl"></i>
                  <div class="text-lg">
                    <p>Listen</p>
                  </div>
                </a>
                <a href="#" class="bg-neutral-750 hover:bg-neutral-700 rounded-xl text-green-500 flex items-center justify-center space-x-4 px-12 py-2">
                  <i class="las la-download text-2xl"></i>
                  <div class="text-lg">
                    <p>Download</p>
                  </div>
                </a>
                <button class="bg-neutral-750 hover:bg-neutral-700 rounded-xl text-green-500 flex items-center justify-center space-x-4 px-12 py-2">
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
</div>
