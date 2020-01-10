function reloadData(html_post, html_get, path){
    $(document).ready(function(){
        var answer = html_post.val();
        $.get(path+answer,function(data){
            html_get.html(data);
            var final_text_pass = data.indexOf('<p style="color:green;">Đạt</p>');
            if (final_text_pass != -1){
                playHappyEndingEffect();
            }
            else{
                var final_text_fail = data.indexOf('<p style="color:red;">Chưa đạt</p>');
                if (final_text_fail != -1){
                    playSadEndingEffect();
                }
                else{
                    var text_true = data.indexOf('Chúc mừng bạn');
                    if (text_true != -1){
                        playTrueEffect();
                    }
                    else{
                        playWrongEffect();
                    }
                }
            }
        });
    });
}

function sendAnswer(){
    reloadData( $('#answer') , $('.modal-body') , 'ajax/check-answer/' );
}

function reloadPage(){
    $(document).ready(function(){
        location.reload();
    });
}

function nextQuestion(){
    $.get('ajax/next-question',function(data){
        reloadPage();
    });
}

function playTrueEffect(){
    var path = 'assets/sound/sound-effect/';
    var effect_name = [ 'kid-yeah.mp3', 'true.mp3'];
    var rand = effect_name[Math.floor(Math.random() * effect_name.length)];
    var effect_final = path+rand;
    console.log(effect_final);
    var audio = new Audio(effect_final);
    audio.play();
}

function playWrongEffect(){
    var path = 'assets/sound/sound-effect/';
    var effect_name = ['wrong.mp3'];
    var rand = effect_name[Math.floor(Math.random() * effect_name.length)];
    var effect_final = path+rand;
    console.log(effect_final);
    var audio = new Audio(effect_final);
    audio.play();
}

function playHappyEndingEffect(){
    var path = 'assets/sound/sound-effect/';
    var effect_name = ['clapping.mp3', 'kid-yeah.mp3'];
    var rand = effect_name[Math.floor(Math.random() * effect_name.length)];
    var effect_final = path+rand;
    console.log(effect_final);
    var audio = new Audio(effect_final);
    audio.play();
}

function playSadEndingEffect(){
    var path = 'assets/sound/sound-effect/';
    var effect_name = ['mario-die.mp3'];
    var rand = effect_name[Math.floor(Math.random() * effect_name.length)];
    var effect_final = path+rand;
    console.log(effect_final);
    var audio = new Audio(effect_final);
    audio.play();
}