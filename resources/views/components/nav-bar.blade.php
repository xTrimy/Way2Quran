@php
    $default_nav_style = "dark:text-neutral-100 text-neutral-800 dark:hover:text-neutral-200 dark:hover:bg-neutral-600 hover:bg-light-500 focus:bg-light-500 dark:focus:text-neutral-200 dark:focus:bg-neutral-600";
    $current_nav_style = "dark:text-green-500 text-green-600 hover:text-green-500 dark:hover:text-green-400 dark:bg-neutral-600 bg-light-500";
@endphp
<div class="hidden items-center justify-between lg:flex text-md">
    <ul class="flex items-center justify-between space-x-1">
        <a href="{{ route('home') }}" class="xl:pr-6 xl:pl-4 pr-3 pl-2 flex items-center py-1 xl:py-2 transition-colors rounded-full cursor-pointer
                {{ $page == 'home' ? $current_nav_style : $default_nav_style }}
            ">
            <li >
                <i class="las la-home text-xl mr-2"></i>
                {{ __('Home') }}
            </li>
        </a>
        <a href="{{ route('reciters') }}" class="xl:pr-6 xl:pl-4 pr-3 pl-2 flex items-center py-1 xl:py-2 transition-colors rounded-full cursor-pointer
                {{ $page == 'reciters' ? $current_nav_style : $default_nav_style }}
            ">
            <li>
                <i class="las la-users text-xl mr-2"></i>
                {{ __('All Reciters') }}
            </li>
        </a>
        <a href="#" class="xl:pr-6 xl:pl-4 pr-3 pl-2 flex items-center py-1 xl:py-2 transition-colors rounded-full cursor-pointer
                {{ $page == 'quran' ? $current_nav_style : $default_nav_style }}
            ">
            <li>
                <i class="las la-quran text-xl mr-2"></i>
                {{ __('The Quran') }}
            </li>
        </a>
        <a href="#" class="xl:pr-6 xl:pl-4 pr-3 pl-2 flex items-center py-1 xl:py-2 transition-colors rounded-full cursor-pointer
                {{ $page == 'ten-readings' ? $current_nav_style : $default_nav_style }}
            ">
            <li>
                <i class="las la-book text-xl mr-2"></i>
                {{ __('The Ten Readings') }}
            </li>
        </a>
        <a href="#" class="xl:pr-6 xl:pl-4 pr-3 pl-2 flex items-center py-1 xl:py-2 transition-colors rounded-full cursor-pointer
                {{ $page == 'various-recitations' ? $current_nav_style : $default_nav_style }}
            ">
            <li>
                <i class="las la-random text-xl mr-2"></i>
                {{ __('Various Recitations') }}
            </li>
        </a>
    </ul>
</div>