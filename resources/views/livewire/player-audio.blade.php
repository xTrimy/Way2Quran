<div class="flex-grow">
    <audio  id="players-{{ time() }}" ata-plyr-config='{"controls":[]}'   class="w-full py-4">
        <source src="{{ route('get_file_chunks',['file_path'=>$surah_audio,'reciter'=>$reciter]) }}" type="audio/mp3" />
    </audio>
    <script>
        window.addEventListener('load', () =>{
            window.surah_play_pause_button = document.getElementById('surah_play_pause_button');
        });
         
        window.addEventListener('contentChanged', event => {
            playAud();
            async function playAud() {
                try {
                    var p = player_();
                    p.autoplay = true;
                    await p.play();
                    document.getElementById('play_pause').innerHTML = '<i class="las la-pause text-3xl"></i>';
                } catch (err) {
                    document.getElementById('play_pause').innerHTML = '<i class="las la-play text-3xl"></i>';
                }
            }
        });
        function player_(){
            window.player = new Plyr('#players-{{ time() }}',{
                title: '{{ $surah->name }}',
                controls: ["progress"],
            });
           
            window.player.on('play', event => {
                console.log('play');
                document.getElementById('play_pause').innerHTML = '<i class="las la-pause text-3xl"></i>';
                console.log(window.surah_play_pause_button);
                if(window.surah_play_pause_button != null){
                    window.surah_play_pause_button.innerHTML = '<i class="las la-pause text-2xl mr-4"></i> Pause';
                }
            });

            window.player.on('pause', event => {
                console.log('pause');
                document.getElementById('play_pause').innerHTML = '<i class="las la-play text-3xl"></i>';
                if(window.surah_play_pause_button != null){
                    window.surah_play_pause_button.innerHTML = '<i class="las la-play text-2xl mr-4"></i> Play';
                }
            });

            window.player.on('ended', event => {
                console.log('ended');
                document.getElementById('play_pause').innerHTML = '<i class="las la-play text-3xl"></i>';
                if(window.surah_play_pause_button != null){
                    window.surah_play_pause_button.innerHTML = '<i class="las la-play text-2xl mr-4"></i> Play';
                }
            });
            if(window.player_source == null){
                document.getElementById('play_pause').addEventListener('click', function(){
                    console.log(window.player.playing);
                    if(window.player.playing){
                        window.player.pause();
                    }else{
                        window.player.play();
                    }
                });
                if(window.surah_play_pause_button != null){
                    window.surah_play_pause_button.addEventListener('click', function(){
                        try{
                            if(window.player.playing){
                                window.player.pause();
                            }else{
                                window.player.play();
                            }
                        }catch(err){
                            console.log(err);
                        }
                    
                    });
                }
                window.player_source = true;
            }
            return window.player;
        }
        window.addEventListener('load', event => {
            player_();
        });
    </script>

</div>
     