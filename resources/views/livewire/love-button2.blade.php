<button wire:click="$emitSelf('love')" class="cursor-pointer">
     @if($added)
        <i id="player-heart" class="las la-heart text-2xl dark:text-green-500 text-green-600 transition-colors"></i>
    @else
        <i id="player-heart" class="lar la-heart text-2xl text-neutral-500 dark:text-white transition-colors"></i>
    @endif
</button>