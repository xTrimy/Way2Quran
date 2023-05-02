<div id="share_modal" class="fixed hidden flex side-paddings items-center justify-center w-full h-full bg-neutral-500 backdrop-blur-sm" style="z-index:99; --tw-bg-opacity:0.4">
    <div class="w-full max-w-xl bg-dark-500 shadow-xl py-4 text-white rounded-lg">
        <div class="flex justify-between items-center mb-3 px-8">
            <p class="text-xl ">Share </p>
            <button id="share_modal_close">
                <i class="las la-times-circle text-2xl cursor-pointer text-neutral-500 hover:text-white"></i>
            </button>
        </div>
        <hr class="border-neutral-500">
        <div class="py-8 flex items-center justify-center space-x-4 px-8">
            {{-- facebook share link --}}
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urldecode( url()->current() ) }}" id="facebook_sharer" target="_blank" class="flex items-center justify-center w-16 text-blue-500 h-16 shadow-md bg-white rounded-full">
                <i class="lab la-facebook-f text-4xl"></i>
            </a>
            {{-- twitter share link --}}
            <a href="https://twitter.com/intent/tweet?text={{ urldecode( url()->current() ) }}" id="twitter_sharer" target="_blank" class="flex items-center justify-center w-16 text-blue-400 h-16 shadow-md bg-white rounded-full">
                <i class="lab la-twitter text-4xl"></i>
            </a>
            {{-- whatsapp share link --}}
            <a href="https://api.whatsapp.com/send?text={{ urldecode( url()->current() ) }}" id="whatsapp_sharer" target="_blank" class="flex items-center justify-center w-16 dark:text-green-500 text-green-600 h-16 shadow-md bg-white rounded-full">
                <i class="lab la-whatsapp text-4xl"></i>
            </a>
        </div>
        <hr class="border-neutral-500">
        <div class="px-8 space-y-2">
            <p class="text-sm text-neutral-500">
            Or copy link
        </p>
        <div class="w-full flex">
            <input type="text" class="flex-grow px-8 py-4 bg-neutral-500 text-black rounded-l-lg " value="{{ urldecode( url()->current() ) }}" id="share_link">
            <button id="copy_share_link" class="bg-primary-500 font-bold flex items-center px-4 rounded-r-lg relative">
                <div class="absolute hidden bottom-full w-48 left-1/2 transform -translate-x-1/2 rounded-md py-1 px-2 bg-black text-white z-50 opacity-0 transition-opacity">
                    Link Copied
                </div>
               <i class="las la-copy text-xl"></i> Copy Link
            </button>
        </div>
        </div>
    </div>
    <script>
        document.getElementById('copy_share_link').addEventListener('click', function(){
            var copyText = document.getElementById("share_link");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            document.querySelector('.absolute').classList.remove('hidden');
            setTimeout(function(){
                document.querySelector('.absolute').classList.remove('opacity-0');
                setTimeout(function(){
                    document.querySelector('.absolute').classList.add('opacity-0');
                    setTimeout(function(){
                        document.querySelector('.absolute').classList.add('hidden');
                    }, 50);
                }, 1500);
            }, 50);
            
        });

        document.getElementById('share_modal').addEventListener('click', function(e){
            if(e.target.id == 'share_modal'){
                document.getElementById('share_modal').classList.add('hidden');
            }
        });

        document.getElementById('share_modal_close').addEventListener('click', function(){
            document.getElementById('share_modal').classList.add('hidden');
        });

        function open_share_modal(link){
            if(link == null){
                link = '{{ urldecode( url()->current() ) }}';
            }
            document.getElementById('share_link').value = link;
            document.getElementById('facebook_sharer').href = "https://www.facebook.com/sharer/sharer.php?u=" + link;
            document.getElementById('twitter_sharer').href = "https://twitter.com/intent/tweet?text=" + link;
            document.getElementById('whatsapp_sharer').href = "https://api.whatsapp.com/send?text=" + link;

            document.getElementById('share_modal').classList.remove('hidden');
        }
    </script>
</div>
