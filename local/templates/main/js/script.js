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
    var empty = ($('#js-basket-button-wrapper-id').find('#js-basket-button-id').length == 0);
    
    $.ajax({
        url: '/remote/include/refresh-basket/',
        type: 'POST',
        success: function (response) {
            $('#js-basket-button-wrapper-id').html(response);
            
            if ($('#js-basket-button-wrapper-id').find('#js-basket-button-id').length > 0) {
                if (empty) {
                    $('#js-basket-button-id').trigger('click');
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
    
    $('#js-menu-link-about-id').on('click', function() {
        if ($(this).data('open')) {
            $('#js-submenu-about-wrap-id').removeClass('slideInRight').addClass('animated slideOutRight');
            setTimeout(function() {
                $('#js-submenu-about-wrap-id').hide();
            }, 600);
            $(this).data('open', false);
        } else {
            $('#js-submenu-about-wrap-id').removeClass('slideOutRight').show().addClass('animated slideInRight');
            $(this).data('open', true);
        }
    });
    
    $('#js-menu-link-programs-id').on('click', function() {
        if ($(this).data('open')) {
            $('#js-submenu-programs-wrap-id').removeClass('slideInRight').addClass('animated slideOutRight');
            setTimeout(function() {
                $('#js-submenu-programs-wrap-id').hide();
            }, 600);
            $(this).data('open', false);
        } else {
            $('#js-submenu-programs-wrap-id').removeClass('slideOutRight').show().addClass('animated slideInRight');
            $(this).data('open', true);
        }
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
        
        getRemoteHTML(remote, '#js-popup-content', {}, function() {
            $('body').addClass('popup-opened');
            console.log('qq');
            $('body').animate({
                    'background-color': 'rgba(255, 255, 255, 0.8)',
                },
                400,
                'swing',
                function() {
                    $('#popup').addClass('is-active');
                    $('#popup .popup-container').removeClass('slideOutLeft').addClass('animated slideInLeft');
                }
            );
            
        });
        
	    return false;
        //setPopupHeight();
    });
    
    /*
    $('.popup-opener').on('click', function() {
        var popup = $(this).data('popup');
        $(popup).addClass('is-active');
        $(popup + ' .popup-container').removeClass('slideOutRight').addClass('animated slideInRight');
	    $('body').addClass('popup-opened');
        //setPopupHeight();
	    return false;
    });
    */

    $('#popup .popup-close').on('click', function(){
        $('#popup .popup-container').removeClass('slideInLeft').addClass('slideOutLeft');
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



$(window).on('load resize', function(){
   /* setPopupHeight();*/
});

(function(){
    var $table = $('.bl_menu_table');

    if (!$table.length) { return; }

    var $days = $('.bl_chose_days_c');
    var tableOffsetTop = $table.offset().top;
    var maxTranslateY = $table.height() - $days.height();

    $(window).on('load scroll', function(){
        var delta = Math.min(window.pageYOffset - tableOffsetTop + 20, maxTranslateY);

        if (delta < 0) {
            delta = 0; 
        }
        $days.css('transform', 'translateY(' + delta + 'px)');
    });
})();



// Wolk
function sliderWidth()
{
	if ($('#homeSlider').length) {
		var logoWidth  = $('.logo').width(),
			menuWidth  = $('.menu > ul').width(),
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

$(window).on('load resize', function(){
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
