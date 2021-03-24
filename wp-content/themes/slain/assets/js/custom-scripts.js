/**
 * slain custom.js
 *
 * @package themecentury
 * @subpackage slain
 * @version 1.0.0
 *
 * Contains handlers to make slain WordPress theme custom javascript
 */
 if( typeof(jQuery)=="undefined" && typeof($)=="function" ){
 	jQuery = $;
 }
 ( function( $ ) {

 	'use strict';
 	var slain_document = $(document);
 	var slain_window = $(window);
 	var slain_rtl = false;
 	if( $('html').attr('dir') == 'rtl' ) {
		slain_rtl = true;
	}

 	var slain = {

 		Snipits:{

            Variables: function(){

                //Write your global variable here
                
            },

            Append: function(){

            	// Responsive Menu 
				$( '#mobile-menu .sub-menu' ).before( '<a class="sub-menu-btn-icon icon-angle-down" href="#"></a>' );

            },

 			Starter: function(){

				var entryHeader = $('.header-branding');
				// Parallax Effect
				if ( entryHeader.data('parallax') == '1' ) {
					entryHeader.parallax({ imageSrc: entryHeader.attr('data-image') });
				}

				// Sidebar Alt Scroll
				$('.sidebar-menu').perfectScrollbar({
					suppressScrollX : true,
					includePadding : true,
					wheelSpeed: 3.5
				});

				// FitVids
				$('.slider-item, .post-media').fitVids();

				// Navigation Hover
				$('#top-menu, #main-menu').find('li').on('mouseenter', function() {
                    $(this).children('.sub-menu').stop().fadeIn( 200 );
                }).on('mouseleave', function() {
                    $(this).children('.sub-menu').stop().fadeOut( 200 );
                });



				// Mobile Menu
				$('.mobile-menu-btn').on( 'click', function() {
					$(this).siblings('.mobile-menu-container').slideToggle();
				});

				// Responsive sub-menu btn
				$('.sub-menu-btn-icon').on( 'click', function(evt){
                    evt.preventDefault();
					$(this).siblings('.sub-menu').slideToggle();
                    $(this).toggleClass( 'fa-rotate-180' );					
				});

                $('.wdgt-title-tabs').flexMenu({
                    linkText: '<i class="fa fa-bars"></i>',
                    linkTextAll: '<i class="fa fa-bars"></i>'
                });

                $( '.flexMenu-popup a' ).on( 'click', function(){
                    var popup_wrapper = $(this).closest( '.flexMenu-popup' );
                    popup_wrapper.siblings('a').click();
                });

 			},

 			AltSidebarOpen: function(){

 				// Sidebar Alt
                $( ".sidebar-menu" ).css('display', 'block');
                $( ".sidebar-menu" ).animate({
                    left: "0",
                }, 200);
 			},

 			AltSidebarClose: function() {
				var leftPosition = parseInt( $( ".sidebar-menu" ).outerWidth(), 10 ) + 30;
                $( ".sidebar-menu" ).animate({
                    left: (leftPosition)*(-1),
                    
                }, {
                    duration: 200,
                    complete: function(){
                        setTimeout(function(){
                            $( ".sidebar-menu" ).css('display', 'none');
                        }, 200 )
                    }
                });
				$('.sidebar-menu-close').fadeOut( 500 );
			},

 			Preloader: function(){

			    if ( $('.slain-preloader-wrap').length ) {
					setTimeout(function(){
						$('.slain-preloader-wrap > div').fadeOut( 600 );
						$('.slain-preloader-wrap').fadeOut( 1500 );
					}, 300);

					if ( $('body').hasClass('elementor-editor-active') ) {
						setTimeout(function(){
							$('.slain-preloader-wrap > div').fadeOut( 600 );
							$('.slain-preloader-wrap').fadeOut( 1500 );
						}, 300);
					}
				}

 			},

 			VisibilityScroller: function(){

                var winWidth = slain_window.width();
 				if($(window).scrollTop()>winWidth){
 					$('.scrolltop').fadeIn('slow');
 				}else{
 					$('.scrolltop').fadeOut('slow');
 				}

 			},

 			ScrollTop: function(evt){

 				$("html, body").animate({
 					scrollTop: 0
 				}, 800);
 				return false;

 			},


 			MobileContainer: function(){

 				if ( $('.mobile-menu-btn').css('display') === 'none' ) {
					$( '.mobile-menu-container' ).css({ 'display' : 'none' });
				}

 			},

 			SearchToggle: function(evt){

 				evt.preventDefault();

 				var mainNavSearch = $('.menu-search-from #searchform');
	
				mainNavSearch.find('#s').attr( 'placeholder', mainNavSearch.find('#s').data('placeholder') );

				if ( mainNavSearch.css('display') === 'none' ) {
					mainNavSearch.fadeIn();
					$('.main-nav-search .fa-times').show();
					$('.main-nav-search .fa-search').hide();
				} else {
					mainNavSearch.fadeOut();
					$('.main-nav-search .fa-times').hide();
					$('.main-nav-search .fa-search').show();
				}

 			},

 			Sliders: function(){

 				var featured_sliders  = $( '.slain-featured-slider' );
 				var slider_global_args = {
					prevArrow: '<span class="prev-arrow icon-angle-left"></span>',
					nextArrow: '<span class="next-arrow icon-angle-right"></span>',
					dotsClass: 'slider-dots',
                    arrows: false,
                    dots: false,
					adaptiveHeight: true,
					rtl: slain_rtl,
					speed: 750,
                    infinite: true,
			  		customPaging: function(slider, i) {
			            return '';
			        }
				};

 				featured_sliders.each(function(){

                    var this_carousel = $(this);
                    this_carousel.on( 'init', function(event, slick){
                        this_carousel.removeClass('before-initialize');
                    });

 					var slider_args = this_carousel.data( 'args' );
 					var this_slider = this_carousel;
                    var this_args = slider_global_args;
                    if(slider_args.arrows){
                        this_args.arrows = true;
                    }
                    if(slider_args.dots){
                        this_args.dots = true;
                    }
                    console.log(slider_args);
                    console.log(this_args);
 					this_slider.slick(this_args);

 				});


				/**
				 * Posts carousel layout
				 */
				$( '.slain-block-carousel' ).each(function(){
                    
                    var this_carousel = $(this);
                    var carousel_args = this_carousel.data('carousel');
                    var carousel_wrapper = this_carousel.closest('.block-posts-wrapper');
                    if( this_carousel.closest('.widget-area').hasClass('small-widget-area') ){
                       carousel_args.slidesToShow=1;
                    }
                    if( this_carousel.closest('.widget-area').hasClass('footer-sidebar-area') ){
                       carousel_args.slidesToShow=1;
                    }

                    carousel_args.prevArrow = carousel_wrapper.find('.navPrev');
                    carousel_args.nextArrow = carousel_wrapper.find('.navNext');
                    this_carousel.on( 'init', function(event, slick){
                        this_carousel.removeClass('before-initialize');
                    });
                    var carousel_obj = this_carousel.slick(carousel_args);
                    

                });


 			},

            TabbedWidget: function(evt){
                
                evt.preventDefault();

                if($(this).closest('li').hasClass('active-item')){
                    return;
                }
                
                var tabbed_content_id = $(this).attr( 'href' );
                var tabbed_wrapper = $(this).closest('.default-tabbed-wrapper');

                tabbed_wrapper.find( 'li' ).removeClass( 'active-item' );
                $(this).closest('li').addClass( 'active-item' );

                tabbed_wrapper.find('.tabbed-section').removeClass('active-content');
                $(tabbed_content_id).addClass('active-content');

            },

 			Widget_Title_Tab: function(evt){

                evt.preventDefault();
                var tab_item = $(this);
                if( tab_item.closest( '.wdgt-tab-term' ).hasClass( 'active-item' ) ){
                    return;
                }
                var widget_title_tabs =  tab_item.closest('.wdgt-title-tabs');
                if( widget_title_tabs.attr( 'data-loading' ) == 1 ){
                    return;
                }

                var tab_content_class = tab_item.data('tab');
                var widget_title = tab_item.closest('.slain-block-title');
                var block_post_widget = tab_item.closest('.slain-widget');
                
                widget_title_tabs.find('.wdgt-tab-term').removeClass('active-item');
                tab_item.closest('li').addClass('active-item');
                block_post_widget.find('.block-posts-wrapper').removeClass( 'tab-active' );
                if( block_post_widget.find( '.' + tab_content_class ).length ){
                    block_post_widget.find( '.' + tab_content_class ).addClass( 'tab-active' );
                    return;
                }
                var ajax_args = $(this).data('ajax-args');
                ajax_args.beforeSend = function(){
                    widget_title_tabs.attr( 'data-loading', 1 );
                    block_post_widget.find('.tcy-wdgt-preloader').removeClass('hidden');
                };
                ajax_args.success = function(data, status, settings){
                    block_post_widget.find('.tcy-wdgt-preloader').addClass('hidden');
                    var widget_html = data.widget_html;
                    if(widget_html){
                        block_post_widget.find('.centurylib-tab-alldata').after(widget_html);
                    }else{
                        console.warn('Sorry faild to retrive widget html data on ajax call');    
                    }
                    widget_title_tabs.attr( 'data-loading', 0 );
                };
                ajax_args.fail = function( xhr, textStatus, errorThrown ){
                    widget_title_tabs.attr( 'data-loading', 0 );
                    console.warn('Sorry faild widget tab ajax call');
                };
                $.ajax(ajax_args);                

            },

			StickySidebar: function() {

				if ( $( '.main-content' ).data('sidebar-sticky') === 1 ) {		

					var SidebarOffset = 0;
					if ( $("#main-nav").attr( 'data-fixed' ) === '1' ) {
						SidebarOffset = 40;
					}

					$('.sidebar-left,.sidebar-right').stick_in_parent({
						parent: ".main-content",
						offset_top: SidebarOffset,
						spacer: '.sidebar-left-wrap,.sidebar-right-wrap'
					});

					if ( $('.mobile-menu-btn').css('display') !== 'none' ) {
						$('.sidebar-left,.sidebar-right').trigger("sticky_kit:detach");
					}

				}

			},

            Accessibility: function () {

                var main_menu_container = $( '#top-menu, #main-menu');
                main_menu_container.find('li.menu-item').focusin(function () {
                    if (!$(this).hasClass('menu-item-focused')) {
                        $(this).addClass('menu-item-focused');
                        $(this).children('.sub-menu').stop().fadeIn( 200 );
                    }
                });
                main_menu_container.find('li.menu-item').focusout(function () {
                    $(this).removeClass('menu-item-focused');
                    $(this).children('.sub-menu').stop().fadeOut( 200 );
                });
                
            }

 		},

 		Events: function(){

 			var __this = slain;
 			var snipits = __this.Snipits;

            snipits.Accessibility();

 			var widget_title_tab = snipits.Widget_Title_Tab;
            slain_document.on( 'click', '.tcy-widgt-title-tab', widget_title_tab );

 			var slain_scroll_top = snipits.ScrollTop;
 			$('.scrolltop').on('click', slain_scroll_top);

 			var slain_search_toggle = snipits.SearchToggle;
 			$( '.main-nav-search' ).on( 'click', slain_search_toggle );

            var tabbed_widget = snipits.TabbedWidget;
            slain_document.on( 'click', '.widget-tab a', tabbed_widget );

            var alt_sidebar_close = snipits.AltSidebarClose;
            $(document).on('click', '.sidebar-menu-close, .sidebar-menu-close-btn', alt_sidebar_close );

            var alt_sidebar_open = snipits.AltSidebarOpen;
            $( document ).on('click','.main-nav-sidebar' , alt_sidebar_open );

 		},

 		Ready: function(){

 			var __this = slain;
 			var snipits = __this.Snipits;
            snipits.Variables();
 			__this.Events();
 			snipits.Append();
 			snipits.Starter();
 			snipits.ScrollTop();
 			snipits.Sliders();
 		},

 		Load: function(){

            var __this = slain;
            var snipits = __this.Snipits;
            snipits.Variables();
            snipits.Preloader();
            snipits.StickySidebar();
            
 		},

 		Resize: function(){

 			var __this = slain;
 			var snipits = __this.Snipits;
            snipits.Variables();
            snipits.StickySidebar();
            snipits.AltSidebarClose();
            snipits.MobileContainer();

 		},

 		Scroll: function(){

 			var __this = slain;
 			var snipits = __this.Snipits;
 			snipits.Variables();
 			snipits.VisibilityScroller();

 		},

 		Init: function(){

 			var __this = slain;
 			var load, ready, resize, scroll;

 			ready = __this.Ready;
 			load = __this.Load;
 			resize = __this.Resize;
 			scroll = __this.Scroll;
 			
 			slain_document.ready(ready);
 			slain_window.load(load);
 			slain_window.resize(resize);
 			slain_window.scroll(scroll);

 		}

 	};


 	slain.Init();

    
 } )( jQuery );
