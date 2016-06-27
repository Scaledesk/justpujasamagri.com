jQuery(document).ready(function($) {

/*-----------------------------------------------------------------------------------*/
/*	Siblings Fader
/*-----------------------------------------------------------------------------------*/         
        
        siblingsFader=function(){
		
            $("#social-icons li, #header_topbar .topbarmenu ul li, .branditems_slider ul li").hover(function() {
    			$(this).siblings().stop().fadeTo(400,0.5);
    		}, function() {
    			$(this).siblings().stop().fadeTo(400,1);
    		});
		
        };
		siblingsFader();
		
		
	$("#review_form_wrapper").show();
	
	$('.custom_show_review_form').click(function () {		
		$("#review_form_wrapper_overlay").show();
		$('.wrapper_header').hide();
	});
	
	$('#review_form_wrapper_overlay_close').click(function () {		
		$("#review_form_wrapper_overlay").hide();
		$('.wrapper_header').show();
	});
	
	$('.demo_top_message .close').click(function () {		
		$(".demo_top_message").slideUp();
	});		
		
	$(".productSlider")
		.mouseenter(function() {
			$(".tdl_zoom").addClass("translated");
		})
		.mouseleave(function() {
			$(".tdl_zoom").removeClass("translated");
		});		



/*-----------------------------------------------------------------------------------*/
/*	fitVids
/*-----------------------------------------------------------------------------------*/
   	
$(".vcontainer").fitVids();
		
/*-----------------------------------------------------------------------------------*/
/*	Product button
/*-----------------------------------------------------------------------------------*/

	/* button show */	
	$('.product_item').mouseenter(function(){
		$(this).find('.product_button_cont').fadeIn(100, function() {
			// Animation complete.
		});
    }).mouseleave(function(){
		$(this).find('.product_button_cont').fadeOut(100, function() {
			// Animation complete.
		});
    });
	
/*-----------------------------------------------------------------------------------*/
/*	SMARTRESIZE PLUGIN
/*-----------------------------------------------------------------------------------*/

(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          };

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 100);
      };
  }
  // smartresize 
  $.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})($,'smartresize');


/*-----------------------------------------------------------------------------------*/
/*	Product thumbs resize
/*-----------------------------------------------------------------------------------*/


		productSetup=function() {
					$('li.productanim3').each(function() {
								var productImageHeight = $(this).find('.loop_product > img').height();
								$(this).find('.image_container').css('padding-bottom', productImageHeight  + 'px');
					});			
				
		},
		productSetup();
				
			
		$(window).smartresize(function(){ 
			productSetup();
		});
		
		productSetup2=function() {
					$('li.productanim4').each(function() {
								var productImageHeight = $(this).find('.loop_product > img').height();
								$(this).find('.loop_product img').css('height', productImageHeight  + 'px');
								$(this).find('.image_container').css('padding-bottom', productImageHeight  + 'px');
					});			
				
		},
		productSetup2();
				
			
		$(window).smartresize(function(){ 
			productSetup2();
		});		


		
/*-----------------------------------------------------------------------------------*/
/*	Custom Select
/*-----------------------------------------------------------------------------------*/	
	
	$('select.main-menu-mobile').width(180).customSelect({customClass:'mobile_menu_select'});
	$('.woocommerce-ordering select').width(130).customSelect({customClass:'barberry_product_sort'});


	
/*-----------------------------------------------------------------------------------*/
/*	Navigation
/*-----------------------------------------------------------------------------------*/	

    var temp, menu = $("#navigation .menu");
    menu.find("li").hover(function(){
        $(this).children('.children').hide().slideDown('normal');
        if($(this).hasClass('mega-item'))
            $(this).children('.children').find('.children').hide().slideDown('normal');
        try{
            $tmp=($(this).children('.children').offset().left+$(this).children('.children').width())-($(".header_box .nav").offset().left+$(".header_box .nav").width());
            if($tmp>0){
                $(this).children('.children').css("right","0");
            }
        }
        catch(e){}
    },function(){
        $(this).children('.children').stop(true,true).hide();
    });

    menu.children("li").each(function(){
        temp = $(this);
        if(temp.children().hasClass("children"))
            temp.addClass("showdropdown");

        if(temp.hasClass('rel'))
            temp.find('.children').append('<span class="mg-menu-tip" style="width:'+temp.width()+'px"></span>');
        else
            temp.find('.children').append('<span class="mg-menu-tip" style="left:'+(temp.position().left-20)+'px;width:'+temp.width()+'px"></span>');
    });


    menu.find(".children.columns").each(function(){
        $countItems=1;
        $(this).children(".mega-item").each(function(){
            temp = $(this);
            if(temp.hasClass("clearleft")){
                $countItems=4;
            }else if(($countItems%3)==1 && $countItems!=1){
                temp.addClass("clearleft");
            }
            $countItems++;
        });
    });
	



    var config = {
        over: function(){
            if ($(this).hasClass('.header-dropdown')){
                $(this).parent().addClass('over');
            } else {
                $(this).addClass('over');
            }
            $('.header-dropdown', this).animate({opacity:1, height:'toggle'}, 100);
        },
        timeout: 0, // number = milliseconds delay before onMouseOut
        out: function(){
            var that = this;
            $('.header-dropdown', this).animate({opacity:0, height:'toggle'}, 100, function(){
                if ($(this).hasClass('.header-dropdown')){
                    $(that).parent().removeClass('over');
                } else {
                    $(that).removeClass('over');
                }
            });
        }
    };
    $('.header-switch, .header-switch .header-dropdown').hoverIntent( config );
	
/*-----------------------------------------------------------------------------------*/
/*	Mobile Navigation
/*-----------------------------------------------------------------------------------*/

    $('.main-menu-mobile').change(function(){
        if($(this).val() !== null){
            document.location.href = $(this).val()
        }
    });
	
	
/*-----------------------------------------------------------------------------------*/
/*	Sticky Header
/*-----------------------------------------------------------------------------------*/	
	
        var headerHeight = $('#header').outerHeight() + 100;
        
        stickyMenuFunction=function(){
        
        var scrollTimer = null;
        $(window).scroll(function () {
            if (scrollTimer) {
                clearTimeout(scrollTimer);
            }
            scrollTimer = setTimeout(handleScroll, 200);
        });
        
        function handleScroll() {
            scrollTimer = null;
            
            var stickyWindowWidth = $(window).width();
            
            if( stickyWindowWidth > 978 ) {
            
                if ($(window).scrollTop() > headerHeight) {
                    $('#sticky-menu').show();
                    $('#sticky-menu').filter(':not(:animated)').animate({top:'0px'}, 200);
                } else {
                    $('#sticky-menu').filter(':not(:animated)').animate({top:'-60px'}, 200, function(){
                        $(this).hide();
                    });
				
                }
            
            } else {
                $('#sticky-menu').hide();				
            }
        }
        
        };
		stickyMenuFunction();
        
        
        $('.sticky-search-trigger a').click(function() {
			$('.header_shopbag').hide();
			$('.sticky-search-trigger').hide();
			
			$('.sticky-search-area').fadeIn('fast', function(){				
                $(this).find('input').focus();
			});
            return false;
		});
        
        $('.sticky-search-area-close a').click(function() {
			$('.header_shopbag').show();
			$('.sticky-search-trigger').fadeIn('fast');
			$('.sticky-search-area').fadeOut('fast');			
            return false;
		});	
	
        $('.search-trigger a').click(function() {
			$('.search-trigger').hide();
			$('.header_shopbag').hide();
			var styles = {position : "absolute", right: "70px" };
			$('.header4 #header #menu').css(styles);
			$('.search-area').fadeIn('fast', function(){				
                $(this).find('input').focus();
			});
            return false;
		});
        
        $('.search-area-close a').click(function() {
			$('.search-area').fadeOut('fast');
			$('.search-trigger').fadeIn('fast');
			$('.header_shopbag').fadeIn('fast');
			var styles = {position : "relative", right: "auto" };
			$('.header4 #header #menu').css(styles);
            return false;
		});	
	
	
/*-----------------------------------------------------------------------------------*/
/*	Minicart
/*-----------------------------------------------------------------------------------*/	

	$(".header_box .header_shopbag").live("mouseenter", function() {
		if(!$(this).data('init'))
        {
            $(this).data('init', true);
            $(this).hoverIntent
            (
                function()
                {
					$('.header_box .tdl_minicart_wrapper').fadeIn(200);
                },

                function()
                {
                    $('.header_box .tdl_minicart_wrapper').fadeOut(200);
                }
            );
            $(this).trigger('mouseenter');
        }
	});

	
	
	$("#sticky-menu .header_shopbag").live("mouseenter", function() {
		if(!$(this).data('init'))
        {
            $(this).data('init', true);
            $(this).hoverIntent
            (
                function()
                {
					$('#sticky-menu .tdl_minicart_wrapper').fadeIn(200);
                },

                function()
                {
                    $('#sticky-menu .tdl_minicart_wrapper').fadeOut(200);
                }
            );
            $(this).trigger('mouseenter');
        }
	});


/*-----------------------------------------------------------------------------------*/
/* Pretty Photo
/*-----------------------------------------------------------------------------------*/


		$("a[rel^='prettyPhoto']").prettyPhoto({
theme: 'pp_default',
		});


/*-------------------------------------------------------------------------*/
/*	Scroll to top
/*-------------------------------------------------------------------------*/	

        /* Floating Go to top Link */
        /* -------------------------------------------------------------------- */
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('.go-top').removeClass('off').addClass('on');
            }
            else {
                $('.go-top').removeClass('on').addClass('off');
            }
        });

        $('.go-top').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });
		

/*-------------------------------------------------------------------------*/
/*	CONTENT TABS
/*-------------------------------------------------------------------------*/
	
	$('.shortcode_tabgroup').find("div.panel").hide();
	$('.shortcode_tabgroup').find("div.panel:first").show();
	$('.shortcode_tabgroup').find("ul li:first").addClass('active');
	 
	$('.shortcode_tabgroup ul li a').click(function(){
		//$('.shortcode_tabgroup ul li').removeClass('active');
		$(this).parent().parent().parent().find('ul li').removeClass('active');
		$(this).parent().addClass('active');
		var currentTab = $(this).attr('href');
		$(this).parent().parent().parent().find('div.panel').hide();
		$(currentTab).fadeIn(300);
		return false;
	});
	
/*-------------------------------------------------------------------------*/
/*	COMPAGE REMOVE Button CLASS
/*-------------------------------------------------------------------------*/	
	
	$('.product-actions .compare-button').find(".button").removeClass('button');
	$('.woocommerce .products').find(".product-category").removeClass('product');
	
/*-------------------------------------------------------------------------*/
/*	CONTENT ACCORDION
/*-------------------------------------------------------------------------*/	

	$('.accordion').each(function(){
		var acc = $(this).attr("rel") * 2;
		$(this).find('.accordion-inner:nth-child(' + acc + ')').show();
		$(this).find('.accordion-inner:nth-child(' + acc + ')').prev().addClass("active");
	});

	$('.toggle h3 a').click(function(){
		$(this).parents('.toggle').find('> div').slideToggle(300);
		$(this).parents('.toggle').toggleClass('open');
		return false;
	});	
	

});