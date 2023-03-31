<div class="w-full py-2 px-4 bg-dark-500 flex items-center">
    <div class="flex items-center mr-2">
        <div class="w-16 h-16 rounded-full bg-white overflow-hidden">
            <img src="{{ asset('images/test.png') }}" class="w-full h-full object-cover" alt="">
        </div>
        <div class="mx-4 text-white">
            <p>{{ $surah_audio->reciter }}</p>
            <p>{{ $surah_audio->surah->name }}</p>
        </div>
        <button class="cursor-pointer">
            <i class="lar la-heart text-2xl text-white"></i>
        </button>
    </div>
    <div class="flex items-center space-x-2 ml-8">
        <button id="play_pause" class="w-16 h-16 rounded-full bg-white hover:bg-neutral-300 active:bg-neutral-400 flex items-center justify-center ">
            <i class="las la-play text-3xl"></i>
        </button>
    </div>
    <div class="flex-grow">
        <audio loop id="players" ata-plyr-config='{"controls":[]}'   class="w-full py-4">
            <source src="{{ asset($surah_audio->path) }}" type="audio/mp3" />
        </audio>
    </div>
</div>

<script>
    const player = new Plyr('#players',{
        title: '{{ $surah->name }}',
        controls: ["progress"],
    });

    player.on('play', event => {
        console.log('play');
        document.getElementById('play_pause').innerHTML = '<i class="las la-pause text-3xl"></i>';
    });

    player.on('pause', event => {
        console.log('pause');
        document.getElementById('play_pause').innerHTML = '<i class="las la-play text-3xl"></i>';
    });

    player.on('ended', event => {
        console.log('ended');
        document.getElementById('play_pause').innerHTML = '<i class="las la-play text-3xl"></i>';
    });

    document.getElementById('play_pause').addEventListener('click', function(){
        if(player.playing){
            player.pause();
        }else{
            player.play();
        }
    });

 
    
</script>