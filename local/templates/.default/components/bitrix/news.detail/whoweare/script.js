$(document).ready(function() {
    
    $(window).bind('scroll',function(e) {
        $('.prllx-small').css('top', (580 - ($(window).scrollTop() * 0.3)) + 'px');
    });
});