<div>
    <button class="dark:text-green-500 text-green-600 text-xl hover:underline">
    Filter <i class="las la-caret-down"></i>
</button>

<div class="flex justify-around mt-8 flex-wrap">
    @foreach ($reciters as $reciter)
        <a href="{{ route('reciters.show',$reciter->slug) }}">
            <div class="w-48 text-center text-primary-500 p-2 rounded-md hover:bg-light-500 dark:hover:bg-neutral-800">
                <div class="w-24 h-24 rounded-full mx-auto mb-2">
                    <img src="{{ asset($reciter->image) }}" class="w-full h-full object-cover rounded-full" alt="Mukhtar Al Hajj">
                </div>
                <p>
                    {{ $reciter->name_en }}
                </p>
                <p>
                    {{ $reciter->name }}
                </p>
            </div>
        </a>
    @endforeach
    <div class="w-48">
    </div>
    <div class="w-48">
    </div>
    <div class="w-48">
    </div>
    <div class="w-48">
    </div>
</div>

</div>