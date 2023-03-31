@php
    $default_nav_style = "text-neutral-100 hover:text-neutral-200 hover:bg-neutral-600 focus:text-neutral-200 focus:bg-neutral-600";
    $current_nav_style = "text-green-500 hover:text-green-400 bg-neutral-600";
@endphp
<div class="flex items-center justify-between  text-md">
    <ul class="flex items-center justify-between space-x-3">
        <a href="{{ route('home') }}" class="pr-8 pl-6 flex items-center py-2 transition-colors rounded-full cursor-pointer
                {{ $page == 'home' ? $current_nav_style : $default_nav_style }}
            ">
            <li >
                <i class="las la-home text-xl mr-2"></i>
                {{ __('Home') }}
            </li>
        </a>
        <a href="{{ route('reciters') }}" class="pr-8 pl-6 flex items-center py-2 text-neutral-100 hover:text-neutral-200 hover:bg-neutral-600 transition-colors rounded-full cursor-pointer
                {{ $page == 'reciters' ? $current_nav_style : $default_nav_style }}
            ">
            <li>
                <i class="las la-users text-xl mr-2"></i>
                {{ __('All Reciters') }}
            </li>
        </a>
        <a href="#" class="pr-8 pl-6 flex items-center py-2 text-neutral-100 hover:text-neutral-200 hover:bg-neutral-600 transition-colors rounded-full cursor-pointer
                {{ $page == 'quran' ? $current_nav_style : $default_nav_style }}
            ">
            <li>
                <i class="las la-quran text-xl mr-2"></i>
                {{ __('The Quran') }}
            </li>
        </a>
        <a href="#" class="pr-8 pl-6 flex items-center py-2 text-neutral-100 hover:text-neutral-200 hover:bg-neutral-600 transition-colors rounded-full cursor-pointer
                {{ $page == 'ten-readings' ? $current_nav_style : $default_nav_style }}
            ">
            <li >
                <i class="las la-book text-xl mr-2"></i>
                {{ __('The Ten Readings') }}
            </li>
        </a>
        <a href="#" class="pr-8 pl-6 flex items-center py-2 text-neutral-100 hover:text-neutral-200 hover:bg-neutral-600 transition-colors rounded-full cursor-pointer
                {{ $page == 'various-recitations' ? $current_nav_style : $default_nav_style }}
            ">
            <li>
                <i class="las la-random text-xl mr-2"></i>
                {{ __('Various Recitations') }}
            </li>
        </a>
    </ul>
</div>