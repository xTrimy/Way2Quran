<header class="w-full py-4 md:rounded-t-3xl side-paddings bg-dark-300 ">
    <div class="w-full h-full justify-between flex items-center space-x-6">
        <div class="xl:h-28 h-20 xl:w-28 w-20">
            <img src="{{ asset('images/logo-original.png') }}" class="w-full h-full object-contain" alt="Way2Quran Logo" >
        </div>
        <div class="flex items-center">
            <x-nav-bar :page="$page" />
            <div class="hidden 2xl:block">
                <x-header-search-bar />
            </div>
            <button class="py-1 ml-2 placeholder-white relative group px-2 xl:px-6 peer rounded-full flex items-center bg-neutral-600 hover:bg-neutral-500 focus:bg-neutral-500 transition-all outline-0 text-white">
                <i class="las la-ellipsis-h text-3xl"></i>
                <div class="z-50 hidden group-focus-within:block absolute right-0 mt-4 top-full transform bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#" id="switch-mode-button" class="flex items-center justify-center px-4 py-2 text-center hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <i class="las la-sun text-2xl mr-2"></i> Light Mode
                                </a>
                            </li>                    
                    </ul>
                </div>
            </button>
        </div>
    </div>
    <script>
        document.getElementById('switch-mode-button').addEventListener('click', function(){
            document.body.classList.toggle('dark');
            this.innerHTML = document.body.classList.contains('dark') ? '<i class="las la-moon text-2xl mr-2"></i> Dark Mode' : '<i class="las la-sun text-2xl mr-2"></i> Light Mode';
        });
    </script>
</header>