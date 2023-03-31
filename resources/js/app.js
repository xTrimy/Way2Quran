import './bootstrap';

// disable the default anchor click behavior
var surah_url = 'http://127.0.0.1:8000/surah'
window.onload = function() {
    if ('querySelector' in document && 'addEventListener' in window) {
        document.addEventListener('click', function (e) {
            // var target = e.target;
            // if (target.closest('a')) {
            //     var href = target.closest('a').getAttribute('href');
            //     if (href && href.indexOf('#') !== 0) {
            //         var force_text_view = false;
            //         var prevent = true;
            //         var push_state = false;
            //         if (target.closest('a').dataset.forcetext == 'true'){
            //             force_text_view = true;
            //             prevent = true;
            //             push_state = true;
            //         }
            //         if (href.indexOf(surah_url) !== -1){
            //             push_state = render_surah_text(href, force_text_view);
            //             play_current_surah(href+'/audio');
            //         }

            //         if (prevent){
            //             e.preventDefault();
            //         }
            //         if (push_state){
            //             window.history.pushState({}, '', href);
            //         }
            //     }
            // }
        }, false);
    }

    window.addEventListener('popstate', function (e) {
        var href = window.location.href;
        if (href.indexOf(surah_url) !== -1){
            render_surah_text(href);
            // play_current_surah(href+'/audio');
        }
        var base_url = window.location.origin;
        // teim slashes from both urls
        base_url = base_url.replace(/\/+$/, "");
        
        if (window.location.href.replace(/\/+$/, "") == base_url){
            window.location.reload();
        }
    });

};

function render_surah_text(href, force_text_view = false){
    var surah_text = document.getElementById('surah_text_container');
    if(!surah_text && !force_text_view){
        return;
    }
    if(!surah_text){
        var site = document.getElementById('site');
        // remove site content
        site.innerHTML = '';

        surah_text = document.createElement('div');
        surah_text.id = 'surah_text_container';
        document.body.appendChild(surah_text);
    }
    // get surah text from the server at href + '/text'
    // and render it in surah_text
    fetch(href + '/text')
        .then(response => response.text())
        .then(data => {
            surah_text.innerHTML = data;
        }
    );
    return true;
}

window.play_current_surah = function(href){
    var surah_audio = document.getElementById('surah_audio_container');
    if(!surah_audio){
        return;
    }
    // get surah audio from the server at href + '/audio'
    // and render it in surah_audio
    fetch(href)
        .then(response => response.text())
        .then(data => {
            surah_audio.innerHTML = data;
            // get the script tag and execute it
            var script = surah_audio.querySelector('script#audio');
            
            // if the script is not null, then execute it
            if (script){
                var clone_script = script.cloneNode(true);
                document.body.appendChild(clone_script);
                // clone_script text to eval
                eval(clone_script.text);
            }
        }
    );

}