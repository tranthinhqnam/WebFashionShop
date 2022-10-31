$(function () {
  $(document).scroll(function () {
    var $nav = $(".header");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});

function navbar_open() {
  $(".nav-btn-expand-overlay").on("click", function () {
    if ($(window).width() > 750) {
      $(".md").css("display", "block");
    } else {
      $(".sm").css("display", "block");
      $(".promo-video-heading").css("display", "none");
    }
    navbar_close();
  });
}

function navbar_close() {
  $(".close-expand-btn").on("click", function () {
    $(".nav-expand-overlay").css("display", "none");
    $(".promo-video-heading").css("display", "block");
    navbar_open();
  });
}

navbar_open();
