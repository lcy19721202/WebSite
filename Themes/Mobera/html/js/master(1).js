// On window load. This waits until images have loaded which is essential
/*global jQuery:false, my_ajax:false, on_resize:false */
/*jshint unused:false */
jQuery(window).load(function() {
	"use strict";


});


/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

jQuery(document).ready(function($) {
	"use strict";

	if ( jQuery(window).width() >= 767 ) {
		jQuery("a.menu-trigger").click(function() {
			jQuery(".mp-menu").css({top: jQuery(document).scrollTop() });

			return false;
		});
	}

	// jQuery('.mp-menu').perfectScrollbar({
	// 	wheelSpeed: 30,
	// 	wheelPropagation: true
	// });
	
	// console.log(jQuery(window).height(), jQuery(".mp-menu").height());
	// jQuery(".mp-menu").css("height", function() {
	// 	if (jQuery(window).height() < jQuery(".mp-menu").height()) {
	// 		return jQuery(window).height();
	// 	} else {
	// 		return jQuery(window).height();
	// 	}
	// });

	// jQuery(".mp-back, .menu-item a").on('click', function() { console.log(jQuery(this).parent().find(".dropdown-menu").height() + 50);
	// 	jQuery(".mp-menu").css("height", function() {
	// 		return (jQuery(this).parent().find(".dropdown-menu").height() + 260) + "px";
	// 	});
	// 	jQuery('.mp-menu').perfectScrollbar('update');
	// });

	jQuery(".page-wrapper .main-inner a").not(".apps_container a, .ui-tabs-nav a, .ui-accordion-header a, .pricing-button a").each(function() {
		jQuery(this).attr("data-hover", jQuery(this).text());
	});

	jQuery(".sidebar-inner li a, .mobera-recentpostsplus.widget h3 a").each(function() {
		jQuery(this).attr("data-hover", jQuery(this).text());
	});

	jQuery(".gallery-icon a").attr('rel', 'prettyphoto');

	jQuery("a[rel^='prettyPhoto']").prettyPhoto();

	jQuery(".hover_bottom_top")
	.mouseenter(function(){
		jQuery(this).animate({ bottom: "10px", opacity: "0.8" }, 300, function() {
			
		});
	}).mouseleave(function(){
		jQuery(this).animate({ bottom: "0px", opacity: "1" }, 300, function() {
			
		});
	});

	jQuery(".hover_top_to_bottom")
	.mouseenter(function(){
		jQuery(this).animate({ top: "3px", opacity: "0.8" }, 200, function() {
			
		});
	}).mouseleave(function(){
		jQuery(this).animate({ top: "0px", opacity: "1" }, 200, function() {
			
		});
	});

	jQuery(".mp-pusher").css("min-height", function() { 
		return jQuery(window).height();
	});

	jQuery(".mobera-recentpostsplus.widget .news-item").last().css({"background":"transparent", "padding":"0", "marginBottom":"0"});
	jQuery(".mobera-twitter.widget .tweet_list li").last().css({"background":"transparent", "padding":"0", "marginBottom":"0"});

	// Apps Carousel
	jQuery(function() {
		jQuery('.carousel-container').jcarousel({
			// Configuration goes here
		});
	});
	jQuery('.jcarousel-prev').click(function() {
		jQuery(this).parent().find('.carousel-container').jcarousel('scroll', '-=1');
	});

	jQuery('.jcarousel-next').click(function() {
		jQuery(this).parent().find('.carousel-container').jcarousel('scroll', '+=1');
	});

	// Opacity hover effect
	jQuery(".opacity_hover").mouseenter(function() {
		var social = this;
		jQuery(social).animate({ opacity: "0.8" }, 80, function() {
			jQuery(social).animate({ opacity: "1.0" }, 80);
		});
	});

    var $window = $(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });

    $.fn.parallax = function(xpos, speedFactor, outerHeight) {
        var $this = $(this);
        var getHeight;
        var firstTop;
        var paddingTop = 0;
        
        //get the starting position of each element to have parallax applied to it      
        $this.each(function(){
            firstTop = $this.offset().top;
        });

        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }
            
        // setup defaults if arguments aren't specified
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;
        
        // function to be called whenever the window is scrolled or resized
        function update(){
            var pos = $window.scrollTop();              

            $this.each(function(){
                var $element = $(this);
                var top = $element.offset().top;
                var height = getHeight($element);

                // Check if totally above or totally below viewport
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }

                $this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
            });
        }       

        $window.bind('scroll', update).resize(update);
        update();
    };

	/**
	 * jQuery.LocalScroll - Animated scrolling navigation, using anchors.
	 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
	 * Dual licensed under MIT and GPL.
	 * Date: 3/11/2009
	 * @author Ariel Flesler
	 * @version 1.2.7
	 **/
	;(function($){var l=location.href.replace(/#.*/,'');var g=$.localScroll=function(a){$('body').localScroll(a)};g.defaults={duration:1e3,axis:'y',event:'click',stop:true,target:window,reset:true};g.hash=function(a){if(location.hash){a=$.extend({},g.defaults,a);a.hash=false;if(a.reset){var e=a.duration;delete a.duration;$(a.target).scrollTo(0,a);a.duration=e}i(0,location,a)}};$.fn.localScroll=function(b){b=$.extend({},g.defaults,b);return b.lazy?this.bind(b.event,function(a){var e=$([a.target,a.target.parentNode]).filter(d)[0];if(e)i(a,e,b)}):this.find('a,area').filter(d).bind(b.event,function(a){i(a,this,b)}).end().end();function d(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')==l&&(!b.filter||$(this).is(b.filter))}};function i(a,e,b){var d=e.hash.slice(1),f=document.getElementById(d)||document.getElementsByName(d)[0];if(!f)return;if(a)a.preventDefault();var h=$(b.target);if(b.lock&&h.is(':animated')||b.onBefore&&b.onBefore.call(b,a,f,h)===false)return;if(b.stop)h.stop(true);if(b.hash){var j=f.id==d?'id':'name',k=$('<a> </a>').attr(j,d).css({position:'absolute',top:$(window).scrollTop(),left:$(window).scrollLeft()});f[j]='';$('body').prepend(k);location=e.hash;k.remove();f[j]=d}h.scrollTo(f,b).trigger('notify.serialScroll',[f])}})(jQuery);
});

// debulked onresize handler

function on_resize(c,t){
	"use strict";

	var onresize=function(){clearTimeout(t);t=setTimeout(c,100);};return c;
}


function clearInput (input, inputValue) {
	"use strict";

	if (input.value === inputValue) {
		input.value = '';
	}
}

function moveOffset(){
	if( jQuery(".full-width").length ) {
		var offset = jQuery(".full-width").position().left;
		jQuery(".full-width").css({
			width: jQuery('.main').width(),
			marginLeft: -offset
		});
	};
};

jQuery(window).on("debouncedresize", function( event ) {
	moveOffset();
}).trigger( "debouncedresize" );

jQuery(document).ready(function() {
	"use strict";

	// Apps tabs
	jQuery(function() {
		if (jQuery( ".featured_apps_container" ).length) {
			jQuery( ".featured_apps_container" ).tabs();
		}
	});
	// !Apps tabs

	// Side menu
	if ( jQuery(window).width() >= 767 ) {
		new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
			type : 'cover'
		} );
	}
	// !Side menu

	// Mobile menu
	jQuery(".menu-trigger").click(function() {
		if ( jQuery(window).width() <= 767 ) {
			if ( jQuery(".menu-container").height() == 133 ) {
				jQuery(".menu-container").animate({ height: "100%" }, 500);
			} else {
				jQuery(".menu-container").animate({ height: 133 }, 500);
			}
			return false;
		}
	});
	// !Mobile menu

	// Search widget
	jQuery('.search.widget .sb-icon-search').click(function(el){
		el.preventDefault();
		jQuery('.search.widget form').submit();
	});
	// !Seaarch widget

	// Search widget
	jQuery('.search-no-results .main-inner .sb-icon-search').click(function(el){
		el.preventDefault();
		jQuery('.search-no-results .main-inner .search form').submit();
	});
	// !Seaarch widget
	
	// Menu Search
	jQuery('.menu-container .sb-icon-search').click(function(el){
		el.preventDefault();

		if( !jQuery('.menu-container .sb-search').hasClass( 'sb-search-open' ) ) {
			jQuery('.menu-container .sb-search').addClass('sb-search-open');
			jQuery('.menu-container .sb-search').animate({
				width: 260
			}, 200, function() {
				// Animation complete.
			});
			jQuery('.menu-container .sb-icon-search').css("background-color", "#fff");

			jQuery('.menu-container .sb-search-input').focus();
			el.preventDefault();

		} else if( jQuery('.menu-container .sb-search').hasClass( 'sb-search-open' ) && jQuery('.menu-container .sb-search-input').val() === '' ) {
			jQuery('.menu-container .sb-search').removeClass('sb-search-open');
			jQuery('.menu-container .sb-search').animate({
				width: 39
			}, 200, function() {
				// Animation complete.
			});
			jQuery('.menu-container .sb-icon-search').css("background-color", "#007aff");
			
			jQuery('.menu-container .sb-search-input').blur();
			el.preventDefault();

		} else if (  jQuery('.menu-container .sb-search').hasClass( 'sb-search-open' ) && jQuery('.menu-container .sb-search-input').val() !== ''  ) {
			jQuery('.menu-container .sb-search form').submit();
		}
	});
	// !Menu search

	// Parallax
	jQuery('.bg-style-2').each(function(){
		var $_this = jQuery(this),
			speed_prl = 0.2;
		jQuery(this).parallax("50%", speed_prl);
		jQuery('.bg-style-2').addClass("parallax-bg-done");
	});
	// !Parallax


	// Social icons hover effect
	jQuery(".social_links li a").mouseenter(function() {
		var social = this;
		jQuery(social).animate({ opacity: "0.5" }, 250, function() {
			jQuery(social).animate({ opacity: "1.0" }, 100);
		});
	});
	// !Social icons hover effect

	// Widget contact form - send
	jQuery("#contact_form").submit(function() {
		jQuery("#contact_form").parent().find("#error, #success").hide();
		var str = jQuery(this).serialize();
		jQuery.ajax({
			type: "POST",
			url: my_ajax.ajaxurl,
			data: 'action=contact_form&' + str,
			success: function(msg) {
				if(msg === 'sent') {
					jQuery("#contact_form").parent().find("#success").fadeIn("slow");
				} else {
					jQuery("#contact_form").parent().find("#error").fadeIn("slow");
				}
			}
		});
		return false;
	});
	// !Widget contact form - send



	// Parallax section
	/*jQuery('.bg-style-2').each(function(){
        var $bgobj = jQuery(this); // assigning the object
     
        jQuery(window).scroll(function() {
            var yPos = -(jQuery(window).scrollTop() / 10); 
             
            // Put together our final background position
            var coords = '50% '+ yPos + 'px';
 
            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        }); 
    });*/
	// !Parallax section
	



	/*if ( jQuery(window).width() >= 997 ) {
		jQuery('.sb-icon-search').click(function(el){
			if( !jQuery('.sb-search').hasClass( 'sb-search-open' ) ) {
				jQuery('.sb-search').addClass('sb-search-open');
				jQuery('.sb-search-input').focus();
				el.preventDefault();

			} else if( jQuery('.sb-search').hasClass( 'sb-search-open' ) && jQuery('.sb-search-input').val() === '' ) {
				jQuery('.sb-search').removeClass('sb-search-open');
				jQuery('.sb-search-input').blur();
				el.preventDefault();

			} else if (  jQuery('.sb-search').hasClass( 'sb-search-open' ) && jQuery('.sb-search-input').val() !== ''  ) {
				jQuery('.sb-search form').submit();
			}
		});
	}
	
	if ( jQuery(window).width() <= 997 ) {
		jQuery('.sb-search').addClass('sb-search-open');
	}*/

	/*var $head = jQuery( '.fixed_header .header #header_container_class' );
	//jQuery( '.fixed_header .header #header_container_class' ).each( function(i) {
		var $el = jQuery( this ),
		$logo   = $head.find('.logo img'),
		$logoH  = $logo.height();
		console.log(jQuery('body').outerHeight(), jQuery(window).outerHeight());
	if ( (jQuery('body').outerHeight() - 190) > jQuery(window).outerHeight() ) {
		jQuery( '.fixed_header .header #header_container_class' ).waypoint( function( direction ) {
			if ( jQuery(window).width() >= 997 ) {
				if( direction === 'down' ) {
					$head.find('.nav').addClass('simple-menu');

					$head.css({
						position: 'fixed'
					});

					$head.css({
						height: '55px',
						lineHeight: '55px'
					});

					jQuery('.header .navbar .nav').css({
						marginTop: '0'
					});
					jQuery('.fixed_header .header .navbar-inner').css({
						lineHeight: '55px'
					});
					//$logo.width('38%');

					if ( jQuery('body').hasClass('admin-bar') ) {
						jQuery('.fixed_header.admin-bar .header #header_container_class').css({top : '28px' });
					} else {
						jQuery('.fixed_header .header #header_container_class').css({top : '0' });
					}
				} else if( direction === 'up' ) {
					$head.css({
						height: '110px',
						lineHeight: '110px',
						position: 'relative'
					});

					jQuery('.header .navbar .nav').css({
						marginTop: '27.5px'
					});
					jQuery('.fixed_header .header .navbar-inner').css({
						lineHeight: '110px'
					});
					//$logo.removeAttr('style');
					jQuery('.fixed_header.admin-bar .header #header_container_class').css({top : '0' });
					
					$head.find('.nav').removeClass('simple-menu');
				}
			}
		}, { offset: -15 } );
	}*/
		
	//});

	/*on_resize(function() {
		jQuery('.rev_slider_wrapper').height('auto');
	}, 100);

	jQuery(".widget_wysija input[type=text]").addClass("span12");
	jQuery(".widget_wysija .wysija-submit-field").addClass("span7 btn btn-primary");

	jQuery('.header .nav .dropdown').hover(function() {
		jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown('fast');
	}, function() {
		jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp('fast');
	});

	jQuery(".offer-text p").dotdotdot({
		watch: true,
		height: 100
	});

	// Carousel
	jQuery('#head_carousel').carousel({
		interval: 9000
	});*/

	/* Merge gallery */
	jQuery('.merge-gallery div').mouseenter(function() {
		jQuery(this).find('.gallery-caption').animate({
			bottom: jQuery(this).find('img').height()
		},250);
	}).mouseleave(function() {
		jQuery(this).find('.gallery-caption').animate({
			bottom: jQuery(this).find('img').height() + 150
		},250);
	});

	

	// Footer contact form - send
	/*jQuery("#contact_form").submit(function() {
		jQuery("#contact_form").parent().find("#error, #success").hide();
		var str = jQuery(this).serialize();
		jQuery.ajax({
			type: "POST",
			url: my_ajax.ajaxurl,
			data: 'action=contact_form&' + str,
			success: function(msg) {
				if(msg === 'sent') {
					jQuery("#contact_form").parent().find("#success").fadeIn("slow");
				} else {
					jQuery("#contact_form").parent().find("#error").fadeIn("slow");
				}
			}
		});
		return false;
	});*/

	/*jQuery('.image_overlay_effect').hover(function() {
		jQuery(this).stop().animate({"opacity": 0.9});
	},function() {
		jQuery(this).stop().animate({"opacity": 0});
	});*/
});

