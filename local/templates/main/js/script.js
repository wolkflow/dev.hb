$.extend($.easing, {
    def: 'easeOutQuad',
    easeOutQuart: function (x, t, b, c, d) {
        return -c * ((t = t/d - 1) * t * t * t - 1) + b;
    },
});



// AJAX-загрузка html.
function getRemoteHTML(link, selector, data, callback)
{
    $.ajax({
        url: '/remote/include/' + link + '/',
        data: data,
        type: 'POST',
        success: function (response) {
            $(selector).html(response);
            callback();
        },
        error: function() {
            
        }
    });
}

// Обновление корзины.
function RefreshBasket()
{
    var $wrap = $('#js-basket-button-wrapper-id');
    var empty = ($wrap.find('#js-basket-button-id').length == 0);
    
    $.ajax({
        url: '/remote/include/refresh-basket/',
        type: 'POST',
        success: function (response) {
            $wrap.html(response);
            
            if ($wrap.find('#js-basket-button-id').length > 0) {
                if (empty) {
                    $wrap.find('#js-basket-button-id').trigger('click');
                }
            }
        }
    });
}


$.extend($.easing, {
    def: 'easeOutQuad',
    easeOutQuart: function (x, t, b, c, d) {
        return -c * ((t = t/d - 1) * t * t * t - 1) + b;
    },
});


(function($){
	$.fn.serializeObject = function(){
		var self = this,
			json = {},
			push_counters = {},
			patterns = {
				"validate": /^[a-zA-Z][a-zA-Z0-9_]*(?:\[(?:\d*|[a-zA-Z0-9_]+)\])*$/,
				"key":      /[a-zA-Z0-9_]+|(?=\[\])/g,
				"push":     /^$/,
				"fixed":    /^\d+$/,
				"named":    /^[a-zA-Z0-9_]+$/
			};
		
		this.build = function(base, key, value) {
			base[key] = value;
			return base;
		};
 
		this.push_counter = function(key) {
			if (push_counters[key] === undefined) {
				push_counters[key] = 0;
			}
			return push_counters[key]++;
		};
 
		$.each($(this).serializeArray(), function() {
			if (!patterns.validate.test(this.name)) {
				return;
			}
			var k,
				keys = this.name.match(patterns.key),
				merge = this.value,
				reverse_key = this.name;
 
			while ((k = keys.pop()) !== undefined) {
				reverse_key = reverse_key.replace(new RegExp("\\[" + k + "\\]$"), '');
 
				if (k.match(patterns.push)) {
					merge = self.build([], self.push_counter(reverse_key), merge);
				} else if(k.match(patterns.fixed)) {
					merge = self.build([], k, merge);
				} else if(k.match(patterns.named)) {
					merge = self.build({}, k, merge);
				}
			}
			json = $.extend(true, json, merge);
		});
		return json;
	};
})(jQuery);




$(function(){
    
    $('.js-phone-mask').mask("\+7 (999) 999-99-99"); 
    
    
    function slmenu($item)
    {
        var $wrap = $('#js-submenu-holder-id');
        
        if ($item.prop('id') == $wrap.data('eid')) {
            $wrap.removeClass('slideInRight').addClass('animated slideOutRight');
            setTimeout(function() {
                $wrap.hide();
                $wrap.data('eid', false);
            }, 600);
            return;
        }
        
        $wrap.data('eid', $item.prop('id'));
        
        if ($wrap.is(':visible')) {
            var $submenu = $wrap.find('.submenu');
            $submenu.fadeOut({
                complete: function() {
                    $wrap.hide();
                    $wrap.html($item.html());
                    $wrap.fadeIn();
                }
            });
        } else {
            $wrap.html($item.html());
            $wrap.removeClass('slideOutRight').show().addClass('animated slideInRight');
        }
    }
    
    
    $('#js-menu-link-about-id').on('click', function() {
        var $that = $(this);
        var $wrap = $('#js-submenu-holder-id');
        var $item = $('#js-submenu-about-wrap-id');
         
        slmenu($item);
        
        if ($that.data('open')) {
            $that.data('open', false);
        } else {
            $that.data('open', true);
        }
        
        /*
        if ($('#js-menu-link-programs-id').data('open')) {
            $('#js-submenu-programs-wrap-id').removeClass('slideInRight').addClass('animated slideOutRight');
            setTimeout(function() {
                $('#js-submenu-programs-wrap-id').hide();
            }, 300);
            $('#js-menu-link-programs-id').data('open', false);
        }
        
        
        if ($that.data('open')) {
            $('#js-submenu-about-wrap-id').removeClass('slideInRight').addClass('animated slideOutRight');
            setTimeout(function() {
                $('#js-submenu-about-wrap-id').hide();
            }, 600);
            $that.data('open', false);
        } else {
            $wrap.html($item.html());
            if ($wrap.is(':visible')) {
                 //$wrap.removeClass('slideOutRight').show().addClass('animated slideInRight');
            } else {
                $wrap.removeClass('slideOutRight').show().addClass('animated slideInRight');
            }
            //$('#js-submenu-about-wrap-id').removeClass('slideOutRight').show().addClass('animated slideInRight');
            $that.data('open', true);
        }
        */
    });
    
    $('#js-menu-link-programs-id').on('click', function() {
        var $that = $(this);
        var $wrap = $('#js-submenu-holder-id');
        var $item = $('#js-submenu-programs-wrap-id');
         
        slmenu($item);
        
        if ($that.data('open')) {
            $that.data('open', false);
        } else {
            $that.data('open', true);
        }
        /*
        
        var $that = $(this);
        var $wrap = $('#js-submenu-holder-id');
        
        if ($('#js-menu-link-about-id').data('open')) {
            $('#js-submenu-about-wrap-id').removeClass('slideInRight').addClass('animated slideOutRight');
            setTimeout(function() {
                $('#js-submenu-about-wrap-id').hide();
            }, 300);
            $('#js-menu-link-about-id').data('open', false);
        }
        
        if ($that.data('open')) {
            $('#js-submenu-programs-wrap-id').removeClass('slideInRight').addClass('animated slideOutRight');
            setTimeout(function() {
                $('#js-submenu-programs-wrap-id').hide();
            }, 600);
            $that.data('open', false);
        } else {
            $('#js-submenu-programs-wrap-id').removeClass('slideOutRight').show().addClass('animated slideInRight');
            $that.data('open', true);
        }
        */
    });
    
    $(window).scroll(function() {
        var scroll = $(window).scrollTop() + $(window).height();
        var width  = '53.5%';
        var height = scroll - 60;
        if ($(window).width() < 768) {
            width  = '90%';
            height = scroll - 20;
        }
        
        $('.cross:not(.animated)').each(function() {
            var $that = $(this);
            
            if (height >= $that.offset().top)  {
                if ($that.data('side') == 'left') {
                    $that.addClass('animated slideInLeft');
                } else {
                    $that.addClass('animated slideInRight');
                }
            }
        });
    });
    
    $(window).scroll(function() {
        var scroll    = $(window).scrollTop() + $(window).height();
        var height    = $('#js-footer-id').offset().top;
        var $callback = $('#js-callback-popup-id');
        
        if (scroll >= height) {
            $callback.offset({top: height - 120});
        } else {
           $callback.css({'top': ''});
        }
    });
    
    
    
    var oldhash = location.hash;
    
    $('a.to-anchor').on('click', function() {
        var urls = $(this).prop('href').split('#');
        var link = urls[0]; 
        var hash = urls[1];
        
        if (location.href == link) {
            hash = '#' + hash;
            if ($(hash).length) {
                $('html, body').animate({
                    scrollTop: ($(hash).offset().top - 30) + 'px'
                }, {duration: 2500, easing: 'easeOutQuart'});
            }
            return false;
        }
    });
    
    $(window).on('load', function(){
		var $urlhash = $(location.hash);
        
        if ($urlhash.length) {
            window.location.hash = '';
            history.pushState('', document.title, window.location.pathname);
            
            $('html, body').animate({
                scrollTop: ($urlhash.offset().top - 30) + 'px'
            }, {duration: 2500, easing: 'easeOutQuart'});
        }
	});
    
    
    $(document).on('click', '.js-submit', function(event) {
        event.preventDefault();
        var $form = $(this).closest('.js-remote-form');
        var data  = $form.serializeObject();
        var link  = $form.data('link');
        
        getRemoteHTML(link, '#js-popup-content', data);
        
        return false;
    });
    
    $(document).on('click', '.popup-opener-remote', function() {
        var remote = $(this).data('remote');
        
        $('#js-basket-button-id').hide();
        $('#js-popup-content').data('remote', remote);
        
        getRemoteHTML(remote, '#js-popup-content', {}, function() {
            $('body').addClass('popup-opened');
            
            $('body').animate({
                    'background-color': 'rgba(255, 255, 255, 0.8)',
                },
                400,
                'swing',
                function() {
                    $('.js-phone-mask').mask("\+7 (999) 999-99-99");
                    $('#popup').addClass('is-active');
                    
                    if (remote == 'basket' && $(window).width() < 768) {
                        $('#popup .popup-container').removeClass('slideOutLeft').removeClass('slideOutDown').addClass('animated slideInUp');
                    } else {
                        $('#popup .popup-container').removeClass('slideOutLeft').removeClass('slideOutDown').addClass('animated slideInLeft');
                    }
                }
            );
            
        });
        
	    return false;
        //setPopupHeight();
    });
    
   
    $('.popup-opener').on('click', function() {
        var popup = $(this).data('popup');
        $(popup).addClass('is-active');
        $(popup + ' .popup-container').removeClass('slideOutRight').addClass('animated slideInRight');
	    $('body').addClass('popup-opened');
        //setPopupHeight();
	    return false;
    });
     /* */

    $('#popup .popup-close').on('click', function(){
        
        if ($('#js-popup-content').data('remote') == 'basket' && $(window).width() < 768) {
            $('#js-popup-content').data('remote', false);
            $('#popup .popup-container').removeClass('slideInLeft').removeClass('slideInUp').addClass('slideOutDown');
        } else {
            $('#popup .popup-container').removeClass('slideInLeft').removeClass('slideInUp').addClass('slideOutLeft');
        }
        setTimeout(function() {
            $('#popup').removeClass('is-active');
        }, 800);
        
	    $('body').removeClass('popup-opened');
        $('#js-basket-button-id').show();
    });
    
    $('#callback-popup .popup-close').on('click', function() {
        $('#callback-popup .popup-container').removeClass('slideInRight').addClass('slideOutRight');
        //$(this).closest('.popup').removeClass('is-active');
        setTimeout(function() {
            $('#callback-popup').removeClass('is-active');
        }, 800);
	    $('body').removeClass('popup-opened');
        $('#js-basket-button-id').show();
    });

    $(document).on('click', '.cabinet-orders-table__toggle', function(event){
        event.preventDefault();

        var $self = $(this);
        var $item = $self.closest('.cabinet-orders-table__item');

        $item.toggleClass('is-active');
        $self.text($item.hasClass('is-active') ? 'Свернуть' : 'Детали');
    });

    $(document).on('click', '.basket-item__count-minus', function() {
        var $input = $(this).siblings('.basket-item__count');
        var currentValue = parseInt($input.val());

        if (currentValue > 1) {
            $input.val(--currentValue + ' шт');
        }
    });
    
    $(document).on('click', '.basket-item__count-plus', function() {
        var $input = $(this).siblings('.basket-item__count');

        $input.val(parseInt($input.val()) + 1 + ' шт');
    });

    $('.sort').on('click', function(){
        $(this).toggleClass('asc').toggleClass('desc');
    })

    var $selectCont = $('.select-cont');
    $selectCont
    .on('click', '.select', function(){
        $(this).toggleClass('active');
    })
    .on('click', '.select-menu__item', function(){
        $selectCont.find('input[type="hidden"]').val($(this).data('value'));
        $selectCont.find('.select').removeClass('active');
    });

    $(document).on('click', function(event){
        if (!$(event.target).parents('.select-cont').length) {
            $selectCont.find('.select').removeClass('active');
        }
    });
    
    $(document).on('click', '.js-link-remote', function() {
        var $that = $(this);
        var link = $that.data('link');
        var selector = $that.data('selector');
        
        getRemoteHTML(link, selector);
    });
});

/*
function setPopupHeight() {
    $('.popup').each(function() {
        $(this).find('.popup-content').css('height', $(this).find('.popup-container').height());
    });
}
*/


$(document).on('mouseup', function (e) {
    var $target = $(e.target);
    if ($('body').hasClass('popup-opened') && !$target.closest('.popup-container').length) {
        $('#popup .popup-close').trigger('click');
        $('#callback-popup .popup-close').trigger('click');
    }
});



$(window).on('load resize', function(){
   /* setPopupHeight();*/
});



if ($(window).width() >= 768) {

    (function(){
        var $table = $('#js-menu-wrapper-id .bl_menu_table');
        
        if (!$table.length) { 
            return; 
        }
        
        var $days = $('#js-menu-wrapper-id .bl_chose_days_c');
        var tableOffsetTop = $table.offset().top;
        var maxTranslateY  = $table.height() - $days.height();
        
        $(window).on('load scroll', function(){
            
            var delta = Math.min(window.pageYOffset - tableOffsetTop + 20, maxTranslateY);
            
            if (delta < 0) {
                delta = 0;
            }
            $days.css('transform', 'translateY(' + delta + 'px)');
        });
    })();

    (function(){
        var $periodCont = $('#js-menu-wrapper-id .bl_chose_days_c_top_days');
        var $checkboxes = $('#js-menu-wrapper-id .bl_chose_days_c_checkboxs').find('input[type="checkbox"]');
        var $days       = $('#js-menu-wrapper-id .bl_menu_table_day');
        var $toggler    = $('#js-menu-wrapper-id .bl_menu_scroll_t');
        var currentPeriod;
        var dotsSpace;
        var $slider = $('#js-menu-wrapper-id .bl_menu_scroll');
        
        var cursorY;
        var startPos;
        var maxDelta = $('#js-menu-wrapper-id .bl_menu_scroll_bar').height() - $toggler.height();
        var maxDeltaSlider = $('#js-menu-wrapper-id .bl_chose_days_c_checkboxs').height() - $slider.height() - 12;
        
        function initPeriod(period)
        {
            currentPeriod = period;
            dotsSpace = $checkboxes.length - period;
            setDots(0);
            
            $slider.data('translateY', 0);
            $slider.css('transform', 'translateY(0px)');
            $slider.prop('class', 'bl_menu_scroll scroll_' + period + '_day');
            
            maxDeltaSlider = $('#js-menu-wrapper-id .bl_chose_days_c_checkboxs').height() - $slider.height() - 12;
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

                if ($self.hasClass('active')) { 
                    return;
                }
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
                    
                    var $day = $('#js-menu-wrapper-id .js-selected-day.active');
                    
                    $('html, body').animate({
                        scrollTop: ($day.offset().top - 5) + 'px'
                    }, {
                        duration: 1200, 
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


} else {
    
    (function(){
        var $table = $('#js-menu-mobile-wrapper-id .bl_menu_table');

        if (!$table.length) { return; }

        var $days = $('#js-menu-mobile-wrapper-id .bl_chose_days_c');
        var tableOffsetTop = $table.offset().top;
        var maxTranslateY = $table.height() - $days.height();
    })();

    (function(){
        var $periodCont = $('#js-menu-mobile-wrapper-id .bl_chose_days_c_top_days');
        var $checkboxes = $('#js-menu-mobile-wrapper-id .bl_chose_days_c_checkboxs').find('input[type="checkbox"]');
        var $days = $('#js-menu-mobile-wrapper-id .bl_menu_table_day');
        var $toggler = $('#js-menu-mobile-wrapper-id .bl_menu_scroll_t');
        var currentPeriod;
        var dotsSpace;
        var $slider = $('#js-menu-mobile-wrapper-id .bl_menu_scroll');
        
        var cursorY;
        var startPos;
        var maxDelta = $('#js-menu-mobile-wrapper-id .bl_menu_scroll_bar').height() - $toggler.height();
        var maxDeltaSlider = $('#js-menu-mobile-wrapper-id .bl_chose_days_c_checkboxs').height() - $slider.height() - 12;
        
        function initPeriod(period)
        {
            currentPeriod = period;
            dotsSpace = $checkboxes.length - period;
            setDots(0);
            
            $slider.data('translateY', 0);
            $slider.css('transform', 'translateY(0px)');
            $slider.prop('class', 'bl_menu_scroll scroll_' + period + '_day');
            
            maxDeltaSlider = $('#js-menu-mobile-wrapper-id .bl_chose_days_c_checkboxs').height() - $slider.height() - 12;
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
        
        $slider.on('touchstart', function(event) {
            var touch = event.originalEvent.touches[0];
            cursorY = touch.clientY;

            //cursorY = event.pageY;
            startPos = parseInt($toggler.data('translateY') || 0);
            
            $('.panelMenu').on('touchmove', function(event) {
                var touch = event.originalEvent.touches[0];
                var delta = startPos + (touch.clientY - cursorY);
                
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
                    
                    var $day = $('#js-menu-mobile-wrapper-id .js-selected-day.active');
                    
                    $('html, body').animate({
                        scrollTop: ($day.offset().top - 5) + 'px'
                    }, {
                        duration: 1200, 
                        easing: 'easeOutQuart',
                        always: function() {
                            slide2day = true;
                        }
                    });
                }, 800);
            });
        });
        
        $(document).on('touchend', function(event){
            $(this).off('touchmove');
        });
        
    })();


}



$(document).ready(function() {
    $('.js-buy-button-id').on('click', function() {
        var $that = $(this);
        
        if ($(window).width() >= 768) {
            var variant = $('#js-menu-wrapper-id .js-variant.active');
            var date    = $('#js-menu-wrapper-id .js-checked-day:checked:first').data('date');
        } else {
            var variant = $('#js-menu-mobile-wrapper-id .js-variant.active');
            var date    = $('#js-menu-mobile-wrapper-id .js-checked-day:checked:first').data('date');
        }
        
        var product = variant.data('product');
        var period  = variant.data('period');
        
        // Выбранные дни.
        var days = [];
        
        if ($(window).width() >= 768) {
            $('#js-menu-wrapper-id .js-checked-day:checked').each(function() {
                days.push($(this).val());
            });
        } else {
            $('#js-menu-mobile-wrapper-id .js-checked-day:checked').each(function() {
                days.push($(this).val());
            });
        }
        
        
        $.ajax({
            url: '/remote/',
            data: {'action': 'add-to-cart', 'product': product, 'days': days, 'period': period, 'date': date, 'type': 'program-common'},
            dataType: 'json',
            type: 'post',
            success: function(response) {
                if (response.status) {
                    RefreshBasket();
                    
                    $that.transfer({
                        to: '#js-basket-button-id',
                        duration: 600
                    });
                }
            }
        });
    });
    
    
    if ($(window).width() >= 768) {
        $('#js-menu-wrapper-id .js-variant').on('click', function() {
            $('#js-menu-wrapper-id .js-program-price-id').text($(this).data('price'));
        });
    } else {
        $('#js-menu-mobile-wrapper-id .js-variant').on('click', function() {
            $('#js-menu-mobile-wrapper-id .js-program-price-id').text($(this).data('price'));
        });
    }
    
});






// Wolk
function sliderWidth()
{
	if ($('#homeSlider').length) {
		var logoWidth = $('.logo').width(),
			menuWidth = $('.menu > ul').width(),
			menuOffset = $('.menu').offset().left;
		$('.sliderText').width(logoWidth + menuWidth - 90);
		$('.sliderText p').width(logoWidth);
		$('.sliderImage').css({'padding-left': menuOffset})
	}
}
$(document).ready(function() {
	$(function () {
		var pull = $('.js-menu-toggle'),
			menu = $('.mobileNav');

		$(pull).on('click', function (e) {
			e.preventDefault();
			menu.toggleClass('in');
		});

		$(window).resize(function () {
			var w = $(window).width();
			if (w > 767) {
				menu.removeClass('in').removeAttr('style');
			}
		});
	});

	$('.mobileNavMenu > li > a').on('click', function(){
		$(this).next('ul').slideToggle(200);
	});
});

if ($('#homeSlider').length) {
	$('#homeSlider').slick({
		dots: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		//vertical: true,
		//verticalSwiping: true,
		dotsClass: 'container slick-dots',
		appendDots: '#sliderDots',
		autoplay: true,
		autoplaySpeed: 7000
	});
}

$(window).on('load resize', function() {
	sliderWidth();
});

if ($('#homeSlider').length) {
	$('#homeSlider').on('init', function(event, slick){
		sliderWidth();
	})
	$('#homeSlider').on('afterChange', function(event, slick, direction){
		sliderWidth()
	});
}
