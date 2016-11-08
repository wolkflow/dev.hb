$(document).ready(function() {
    
    $(window).bind('scroll',function(e) {
        if ($(window).width() > 992) {
            $('.prllx-small').css('top', (580 - ($(window).scrollTop() * 0.3)) + 'px');
        } else {
            $('.prllx-small').css('top', (380 - ($(window).scrollTop() * 0.3)) + 'px');
        }
    });
});