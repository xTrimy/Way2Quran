<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $surah->name }}</title>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
    @vite('resources/css/app.css')
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    
    <style>
        #list {
    margin: 0 auto;
    width: 60%;
    height: 100%;
    position: relative;
    overflow: auto;
    background: #2879364f;
    justify-content: flex-start; 
}
    </style>
</head>
<body dir="rtl" class="overflow-x-hidden bg-neutral-750">

<div id="surah_text_container">
    <x-surah-text :surah="$surah" :ayah="$ayah" />
</div>
<div id="surah_audio_container">
    <x-surah-audio :surah="$surah" :reciter="$reciter" />
</div>
    

@vite('resources/js/app.js')
</body>
</html>