
(function() {
    var $periodCont = $('.bl_chose_days_c_top_days');
    var $checkboxes = $('.bl_chose_days_c_checkboxs').find('input[type="checkbox"]');
    var $days = $('.bl_menu_table_day');
    var $toggler = $('.bl_menu_scroll_t');
    var currentPeriod;
    var dotsSpace;
    var $slider = $('.bl_menu_scroll');
    
    var cursorY;
    var startPos;
    var maxDelta = $('.bl_menu_scroll_bar').height() - $toggler.height();
    var maxDeltaSlider = $('.bl_chose_days_c_checkboxs').height() - $slider.height() - 12;
    
    function initPeriod(period)
    {
        currentPeriod = period;
        dotsSpace = $checkboxes.length - period;
        setDots(0);
        
        $slider.data('translateY', 0);
        $slider.css('transform', 'translateY(0px)');
        
        $slider.prop('class', 'bl_menu_scroll scroll_' + period + '_day');
        
        maxDeltaSlider = $('.bl_chose_days_c_checkboxs').height() - $slider.height() - 12;
        
        /*
        $toggler.data('translateY', 0);
        $toggler.css('transform', 'translateY(0px)');
        */
    }

    function setDots(start)
    {
        $checkboxes.prop('checked', false);
        $checkboxes.slice(start, start + currentPeriod).prop('checked', true);

        $days.filter('.active').removeClass('active');
        $days.slice(start, start + currentPeriod).addClass('active');
    }

    $periodCont.children('span')
        .on('click', function(){
            var $self = $(this);

            if ($self.hasClass('active')) { return; }

            $self.addClass('active').siblings('.active').removeClass('active');
            initPeriod($self.data('period'));
        })
        .filter(':first').trigger('click');

    
    
    var slide2day = true;
    
    $slider.on('mousedown', function(event) {
        cursorY = event.clientY;
        startPos = parseInt($toggler.data('translateY') || 0);
        
        $(document).on('mousemove', function(event) {
            var delta = startPos + (event.clientY - cursorY);
            
            if (delta < 0) {
                delta = 0; 
            }
            delta = Math.min(delta, maxDeltaSlider);

            $slider.data('translateY', delta);
            $slider.css('transform', 'translateY(' + delta + 'px)');
            
            setDots(Math.max(Math.round((delta / maxDeltaSlider).toFixed(2) * dotsSpace), 0));
            
            setTimeout(function() {
                if (!slide2day) {
                    return;
                }
                slide2day = false;
                
                var $day = $('.js-selected-day.active');
                
                $('html, body').animate({
                    scrollTop: ($day.offset().top - 5) + 'px'
                }, {
                    duration: 2500, 
                    easing: 'easeOutQuart',
                    always: function() {
                        slide2day = true;
                    }
                });
            }, 800);
        });
    });
    
    $(document).on('mouseup', function(event){
        $(this).off('mousemove');
    });

})();