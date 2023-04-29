<div>
    <button id="surah_love_button" data-surah="{{$surah->id}}" data-reciter="{{ $reciter->id }}" wire:click="$emitSelf('love')" class="rounded-full mr-4 mb-2 text-neutral-400 flex items-center py-1 pl-4 pr-8 text-lg border border-neutral-400">
        @if($added)
            <i class="las text-green-500 transition-colors la-heart text-2xl mr-4"></i> Added
        @else
            <i class="lar la-heart text-2xl mr-4 transition-colors text-neutral-400"></i> Add
        @endif
    </button>
    <script>
        window.addEventListener('loveAdded',function(event){
            var data = event.detail;
            var added = data[0];
            var surah_id = data[1];
            var reciter_id = data[2];
            if(surah_id != document.getElementById('surah_love_button').dataset.surah){
                return;
            }
            if(reciter_id != document.getElementById('surah_love_button').dataset.reciter){
                return;
            }

            if(added){
                document.getElementById('surah_love_button').innerHTML = '<i class="las text-green-500 transition-colors la-heart text-2xl mr-4"></i> Added';
            }else{
                document.getElementById('surah_love_button').innerHTML = '<i class="lar la-heart text-2xl mr-4 transition-colors text-neutral-400"></i> Add';
            }
        });
    </script>
</div>