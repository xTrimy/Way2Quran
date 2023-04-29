<button wire:click="$emitSelf('love')" class="cursor-pointer">
     @if($added)
        <i id="player-heart" class="las la-heart text-2xl text-green-500 transition-colors"></i>
    @else
        <i id="player-heart" class="lar la-heart text-2xl text-white transition-colors"></i>
    @endif
</button>