@php
    $page_reciter = $reciter;
    $surah_audio = $surah->surah_audio()->where('reciter',$reciter)->first();
    $audio = explode('/',$surah_audio->path);
    $reciter = $audio[1];
    $surah_file = $audio[2];

@endphp
<div style="--tw-bg-opacity:0.5" class="fixed backdrop-blur-sm bottom-0 w-full px-12 z-50 text-white bg-neutral-900 py-4">
            <div class="flex justify-between items-center flex-wrap lg:flex-nowrap">
                <div class="flex w-1/2 lg:w-1/3 lg:flex-nowrap flex-wrap">
                    <p class="mx-4">القارئ</p>
                    <select class="text-white bg-neutral-800 lg:w-auto w-32">
                        @foreach($surah->surah_audio()->get() as $audio)
                            @php
                                $reciter_x = $audio->reciter;
                            @endphp
                            <option {{ $surah_audio->reciter == $reciter_x?"selected":"" }} value="{{ $reciter_x }}">{{ $reciter_x }}</option>
                        @endforeach
                    </select>
                    <script>
                        document.querySelector('select').addEventListener('change',function(){
                            var reciter = this.value;
                            console.log("{{ route('surah',["surah_name"=>$surah->name]) }}/"+reciter);
                            window.location.href = "{{ route('surah_reciter',["surah_name"=>$surah->name]) }}/"+reciter;
                        });
                    </script>
                </div>
                <div class="text-center w-1/2 lg:w-1/3 flex justify-center py-4 text-xl lg:text-3xl">
                @if($previous_surah != null)
                @php
                    $surah_name = str_replace(" ","-",trim($previous_surah->name," "));
                @endphp
                    <a href="{{ route('surah_reciter',["surah_name"=>$surah_name,'reciter'=>$page_reciter]) }}" class="mx-4" >
                        <i class="las la-chevron-right ltr:rotate-180"></i>
                    </a>
                    @else
                    <div class="mx-4 opacity-0">
                        <i class="las la-chevron-right ltr:rotate-180"></i>
                    </div>
                @endif
                <a href="{{ route('surah_reciter',["surah_name"=>$surah->name,'reciter'=>$page_reciter]) }}" data-forceText="true">
                    {{ $surah->name }}
                </a>
                @if($next_surah != null)
                @php
                    $surah_name = str_replace(" ","-",trim($next_surah->name," "));
                @endphp
                    <a href="{{ route('surah_reciter',["surah_name"=>$surah_name,'reciter'=>$page_reciter]) }}" class="mx-4">
                        <i class="las la-chevron-left ltr:rotate-180"></i>
                    </a>
                    @else
                    <div class="mx-4 opacity-0">
                        <i class="las la-chevron-left ltr:rotate-180"></i>
                    </div>
                @endif
            </div>
            <div class="w-full lg:border-0 border-t border-white lg:py-0 py-4 lg:w-1/3 flex justify-center lg:justify-end">
                <div class="mx-4">
                    <i class="las text-2xl lg:text-4xl la-heart"></i>
                </div>
                <div class="mx-4">
                    <i class="las text-2xl lg:text-4xl la-share"></i>
                </div>
                <script>
                    var interactive_listening = false;
                </script>
                @if($surah_audio->segments->count() > 0)
                    <div onclick="
                        console.log('clicked');
                        interactive_listening = !interactive_listening;
                        if(interactive_listening){
                            this.classList.add('text-primary-500');
                        }else{
                            this.classList.remove('text-primary-500');
                        }"
                     class="mx-4">
                        <i class="las text-2xl lg:text-4xl la-book-reader"></i>
                    </div>
                @endif
            </div>
            </div>
            <audio id="players" controls class="w-full py-4">
            <source src="{{ route('get_file_chunks',["reciter"=>$reciter,"file_path"=>$surah_file]) }}" type="audio/mp3" />
            </audio>
    </div>
    <script id="audio">
          function audio_script(){
                const player = new Plyr('#players',{
                    title: '{{ $surah->name }}',
                });
                // check if can play automatically
                player.on('canplay', function(){
                    player.play();
                });

                        var albumData = {
                    title: "{{ $surah->name }}",
                    tracks: [
                        {
                            id: ":1:",
                            title: "{{ $surah->name }}",
                            mp3_link:
                                "{{ asset("Quran_test/001.mp3") }}"
                        },
                    ]
                };

var surah_text = document.getElementById('surah-text');
// get surah name from surah_text data-surahName
if(surah_text){
    var surah_name = surah_text.dataset.surahname;
    if(surah_name == '{{ $surah->name }}'){
        segmentation();
    }
}
function segmentation(){
const segments = [
    @foreach ($surah_audio->segments as $segment)
        '{{ $segment->ayah_id }}',
    @endforeach
    ];
const segments_times = [
@foreach ($surah_audio->segments as $segment)
        '{{ $segment->start_at }}',
    @endforeach
    "999999"
];

var ayat = document.getElementsByClassName('ayah');
if(!ayat) return;
for(let i = 0; i < ayat.length; i++){
    let ayah = ayat[i];
    ayah.addEventListener('click', function(){
        if(!interactive_listening){
            return;
        }
        let id = ayah.id.split('-')[1];
        let index = segments.indexOf(id);
        let time = segments_times[index];

        player.currentTime = Math.ceil(time);
        if(!player.playing){
            player.play();
        }
    });
}

var current_ayah_style = "text-primary-500";
var current_segment = 0;
var current_ayah_temp;
setInterval(function(){
    var surah_text = document.getElementById('surah-text');
    if(!surah_text) return;
    if(!interactive_listening) {
        clear_ayah_style();
        return;
    };
    var surah_name = surah_text.dataset.surahname;
    if(surah_name != '{{ $surah->name }}'){
        return;
    }
    if(player.stopped || player.ended){
        clear_ayah_style();
    }
    if(player.playing){
        var currentTime = player.currentTime;
        var current = 0;
        for(let i = 0; i<segments.length; i++){
            if(segments_times[i] < currentTime && segments_times[i+1] > currentTime){
                var current_ayah = document.getElementById('ayah-'+segments[i]);
                    clear_ayah_style();
                    current_ayah.classList.add(current_ayah_style);
                if(current_ayah != current_ayah_temp){
                    current_ayah_temp = current_ayah;
                    current_ayah.scrollIntoView();
                }
                return;
            }
        }
    }
},500);
}
        }
function clear_ayah_style(){
        var ayat = document.getElementsByClassName('ayah');
        for(var j = 0; j<ayat.length;j++){
            ayat[j].classList.remove("text-primary-500")
        }
}
audio_script();
</script>