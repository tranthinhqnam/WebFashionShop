$(function () {
    $(document).scroll(function () {
      var $nav = $(".header");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });


$(document).ready(function(){
  $('.nav-btn-expand-overlay').on('click',function(){
    if($(window).width() > 767){
      $('.md').css('display', 'block')
    }
    else{
      $('.sm').css('display', 'block')
    }
  })
})

$(document).ready(function(){
  $('.close-expand-btn').on('click',function(){
    $('.nav-expand-overlay').css('display', 'none')
  })
})

