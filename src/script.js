$(function() {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 20){
            $('#navbar').addClass('navbar_color');
        }else{
            $('#navbar').removeClass('navbar_color');
        }
    });
});