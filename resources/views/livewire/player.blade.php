<div id="player_audio_container" class="w-full py-2 px-4 bg-dark-500 flex lg:flex-nowrap flex-wrap items-center" data-surah="{{ $surah_audio->surah_id }}" data-reciter="{{ $surah_audio->reciter_id }}" data-surah-audio="{{ $surah_audio->id }}">
    <div class="flex lg:justify-start justify-between lg:w-auto w-full">
        <div class="flex items-center mr-2">
            <div class="lg:w-16 w-9 lg:h-16 h-9 rounded-full bg-white overflow-hidden">
                <img src="{{ asset($reciter->image) }}" class="w-full h-full object-cover" alt="">
            </div>
            <div class="mx-4 text-white lg:text-base text-sm">
                <p><a href="{{ route('reciters.show',$reciter) }}">{{ $surah_audio->reciter_model->name }}</a></p>
                <p><a href="{{ route('surah',['reciter'=>$reciter->id,'surah_name'=>$surah_audio->surah->name]) }}">{{ $surah_audio->surah->name }}</a></p>
            </div>
            <livewire:love-button :surah="$surah" :reciter="$reciter" icon_only="false" :key="$surah->id.$reciter->id" />
        </div>
        <div class="flex flex-grow justify-around items-center space-x-2 lg:ml-8 ml-2">
            <a href="{{ route('surah',['surah_name'=>$prev_surah->name,'reciter'=>$reciter->id]) }}">
                <div class="lg:w-6 w-4 lg:h-6 h-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 23 23">
                        <defs>
                            <clipPath id="clip-path">
                            <rect id="Rectangle_70" data-name="Rectangle 70" width="23" height="23" transform="translate(0.259 0)" fill="currentColor" stroke="currentColor" stroke-width="1"/>
                            </clipPath>
                        </defs>
                        <g id="Mask_Group_19" data-name="Mask Group 19" transform="translate(23.259 23) rotate(180)" opacity="0.6" clip-path="url(#clip-path)">
                            <g id="forward-button" transform="translate(-0.033 1.889)">
                            <path id="Path_10" data-name="Path 10" d="M12.434,8.217,2.3.169A1.6,1.6,0,0,0,.755.233,1.552,1.552,0,0,0,0,1.562v16.1a1.553,1.553,0,0,0,.755,1.328,1.608,1.608,0,0,0,1.548.063L12.435,11c.488-.459.873-.8.873-1.394S12.981,8.7,12.434,8.217Z" fill="currentColor"/>
                            <path id="Path_11" data-name="Path 11" d="M12.435,8.217,2.3.169A1.6,1.6,0,0,0,.755.233,1.552,1.552,0,0,0,0,1.562v16.1a1.553,1.553,0,0,0,.755,1.328,1.608,1.608,0,0,0,1.548.063L12.435,11c.488-.459.873-.8.873-1.394S12.982,8.7,12.435,8.217Z" transform="translate(9.758)" fill="currentColor"/>
                            </g>
                        </g>
                    </svg>
                </div>

            </a>
            <button id="play_pause" class="lg:w-16 w-12 lg:h-16 h-12 rounded-full bg-white hover:bg-neutral-300 active:bg-neutral-400 flex items-center justify-center ">
                <div wire:loading>
                    <i class="las la-spinner animate-spin lg:text-3xl text-2xl"></i>
                </div>
                <div wire:loading.remove>
                    <i class="las la-play lg:text-3xl text-2xl"></i>
                </div>
            </button>
            <a href="{{ route('surah',['surah_name'=>$next_surah->name,'reciter'=>$reciter->id]) }}">
                <div class="lg:w-6 w-4 lg:h-6 h-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 23 23">
                        <defs>
                            <clipPath id="clip-path">
                            <rect id="Rectangle_69" data-name="Rectangle 69" width="23" height="23" transform="translate(-0.259 0)" fill="currentColor" stroke="currentColor" stroke-width="1"/>
                            </clipPath>
                        </defs>
                        <g id="Mask_Group_18" data-name="Mask Group 18" transform="translate(0.259 0)" opacity="0.6" clip-path="url(#clip-path)">
                            <g id="forward-button" transform="translate(-0.033 1.889)">
                            <path id="Path_8" data-name="Path 8" d="M12.434,11.8,2.3,3.752a1.6,1.6,0,0,0-1.547.063A1.552,1.552,0,0,0,0,5.145v16.1a1.553,1.553,0,0,0,.755,1.328,1.608,1.608,0,0,0,1.548.063l10.132-8.05c.488-.459.873-.8.873-1.394S12.981,12.282,12.434,11.8Z" transform="translate(0 -3.582)" fill="currentColor"/>
                            <path id="Path_9" data-name="Path 9" d="M30.626,11.8,20.493,3.752a1.6,1.6,0,0,0-1.548.063,1.552,1.552,0,0,0-.755,1.33v16.1a1.553,1.553,0,0,0,.755,1.328,1.608,1.608,0,0,0,1.548.063l10.132-8.05c.488-.459.873-.8.873-1.394S31.172,12.282,30.626,11.8Z" transform="translate(-8.432 -3.582)" fill="currentColor"/>
                            </g>
                        </g>
                    </svg>
                </div>

            </a>
            <button class="px-2 text-neutral-400" onclick="loopButton(this)" type="button">
                <div class="lg:w-6 w-4 lg:h-6 h-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 25 25">
                        <path id="arrows-repeat-1" d="M11.458,15.625V11.889l-.305.305A1.041,1.041,0,1,1,9.68,10.722l2.083-2.083a1.041,1.041,0,0,1,1.778.736v6.25a1.042,1.042,0,0,1-2.083,0Zm12.5-4.167A1.041,1.041,0,0,0,22.916,12.5a6.256,6.256,0,0,1-6.25,6.25H3.125l2.389-2.389a1.041,1.041,0,0,0-1.473-1.473L.61,18.319a2.085,2.085,0,0,0,0,2.946l3.43,3.43a1.041,1.041,0,0,0,1.473-1.473L3.125,20.833H16.666A8.343,8.343,0,0,0,25,12.5a1.041,1.041,0,0,0-1.042-1.042ZM1.042,13.542A1.041,1.041,0,0,0,2.083,12.5a6.256,6.256,0,0,1,6.25-6.25H21.875L19.486,8.638a1.041,1.041,0,1,0,1.473,1.473l3.43-3.43a2.085,2.085,0,0,0,0-2.946L20.959.305a1.041,1.041,0,1,0-1.473,1.473l2.389,2.389H8.333A8.343,8.343,0,0,0,0,12.5,1.041,1.041,0,0,0,1.042,13.542Z" transform="translate(0 0)" fill="currentColor"/>
                    </svg>
                </div>
            </button>
        </div>
    </div>
    <div class="flex-grow">
        <livewire:player-audio key="{{ now() }}" :surah_audio="$surah_audio->path" :surah="$surah" />
    </div>
    <script>
        window.addEventListener('loveAdded',function(event){
            var data = event.detail;
            var added = data[0];
            var surah_id = data[1];
            var reciter_id = data[2];
            if(surah_id != document.getElementById('player_audio_container').dataset.surah){
                return;
            }
            if(reciter_id != document.getElementById('player_audio_container').dataset.reciter){
                return;
            }
            if(added){
                document.getElementById('player-heart').classList.remove('lar');
                document.getElementById('player-heart').classList.add('las');
                document.getElementById('player-heart').classList.add('text-green-500');
                document.getElementById('player-heart').classList.remove('text-white');
            }else{
                document.getElementById('player-heart').classList.remove('las');
                document.getElementById('player-heart').classList.add('lar');
                document.getElementById('player-heart').classList.remove('text-green-500');
                document.getElementById('player-heart').classList.add('text-white');
            }
        });

        function loopButton(e){
            window.player.loop = !window.player.loop;
            if(window.player.loop){
                e.classList.add('text-green-500');
                e.classList.remove('text-neutral-400');
            }else{
                e.classList.remove('text-green-500');
                e.classList.add('text-neutral-400');
            }
        }
    </script>
</div>
