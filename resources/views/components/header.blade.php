<header class="w-full py-4 rounded-t-3xl side-paddings bg-dark-300 ">
    <div class="w-full h-full justify-between flex items-center space-x-6">
        <div class="h-28 w-28">
            <img src="{{ asset('images/logo-original.png') }}" class="w-full h-full object-contain" alt="Way2Quran Logo" >
        </div>
        <div class="flex items-center space-x-3">
            <x-nav-bar :page="$page" />
            <x-header-search-bar />
            <button class="py-1 placeholder-white px-6 peer rounded-full flex items-center bg-neutral-600 hover:bg-neutral-500 focus:bg-neutral-500 transition-all outline-0 text-white">
                <i class="las la-ellipsis-h text-3xl"></i>
            </button>
        </div>
    </div>
</header>