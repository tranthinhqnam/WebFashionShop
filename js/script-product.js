$(document).ready(function(){
    $("#s1").on('click', function(){
        $('.first').css("margin-left","0");
    })
})
$(document).ready(function(){
    $("#s2").on('click', function(){
        if($(window).width() < 992){
            if($(window).width() < 768){
                $('.first').css("margin-left","-470px");
            }
            else{
                $('.first').css("margin-left","-700px");
            }
        }
        else{
            $('.first').css("margin-left","-500px");
        }
    })
})
$(document).ready(function(){
    $("#s3").on('click', function(){
        if($(window).width() < 992){
            if($(window).width() < 768){
                $('.first').css("margin-left","-940px");
            }
            else{
                $('.first').css("margin-left","-1400px");
            }
        }
        else{
            $('.first').css("margin-left","-1000px");
        }
    })
})

var counter = "1"
var interval = null
$(document).ready(function(){
    $(".auto").on('click', function(){
        interval = setInterval(function(){
            $('#s' + counter).click()
            counter++
            if(counter>3)
                {counter=1}
        },2000)
    })
})

$(interval).ready(function(){
    $('.pause').on('click', function(){
        clearInterval(interval)
    })
})