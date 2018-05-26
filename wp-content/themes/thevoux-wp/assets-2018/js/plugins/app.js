// jQuery plugins
(function ($, window, _) {
	'use strict';

  var lastTime = 0,
      vendors = ['ms', 'moz', 'webkit', 'o'];

  for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
      window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
      window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
  }

  if (!window.requestAnimationFrame) {
      window.requestAnimationFrame = function(callback, element) {
          var currTime = new Date().getTime();
          var timeToCall = Math.max(0, 16 - (currTime - lastTime));
          var id = window.setTimeout(function() { callback(currTime + timeToCall); },
            timeToCall);
          lastTime = currTime + timeToCall;
          return id;
      };
  }

  if (!window.cancelAnimationFrame){
      window.cancelAnimationFrame = function(id) {
          clearTimeout(id);
      };
  }

	// Utility functions
	// function getParameterHash() {
	//	return _.object(_.compact(_.map(location.search.slice(1).split('&'), function(item) {  if (item) return item.split('='); })));
	// }

	  $(document).on("click", "[data-accordion-trigger]", function(e) {
	    $(this).parent().find('.submenu').slideToggle('fast');  // apply the toggle to the ul
	    $(this).parent().toggleClass('is-expanded');
	    $(this).parent().find('.v1-icon-add').toggleClass('rotate');
	    e.preventDefault();
	  });

	var $doc = $(document),
		win = $(window),
		Modernizr = window.Modernizr,
		wrapper = $('#wrapper'),
		thb_easing = [0.25, 0.1, 0.25, 1];

	var SITE = SITE || {};

	SITE = {
		init: function() {
			var self = this,
				obj;

			window.thb_init = true;
			for (obj in self) {
				if ( self.hasOwnProperty(obj)) {
					var _method =  self[obj];
					if ( _method.selector !== undefined && _method.init !== undefined ) {
						if ( $(_method.selector).length > 0 ) {
							_method.init();
						}
					}
				}
			}
		},
		PlaceTheCaret: {
			selector: 'body',
			init: function() {
				var path = window.location.pathname;

				// determine when we're in the magazine section, or a taxonomy page, or search
				var magRegex = /(\/mag)|(\/+$)/gi;
				var taxonomyRegex = /(^\/location\/)|(^\/vibe\/)|(^\/room\/)|(^\/product\/)/gi;
				var searchRegex = /^\/\?s=/gi;

				var magazine_page = path.match(magRegex) || path.match(taxonomyRegex) || path.match(searchRegex);

				if(magazine_page) {
					$('nav a[href$="/mag"]').closest('h6').addClass('active');
				} else {
					$('nav a[href$="https://www.homepolish.com"]').closest('h6').addClass('active');
				}
			}
		},
		SmoothScroll: {
			selector: '.smooth_scroll',
			init: function() {
				smoothScroll();
			}
		},
		header: {
			selector: '.header_container > .header',
			init: function() {
				var base = this,
					header = $(base.selector),
					container = header.parent(),
					mainDiv = container.siblings('[role="main"]'),
					menu = header.find('#full-menu'),
					menuAuth = menu.find('#full-menu-links-auth'),
					social_btn = header.find('#social_header'),
					social_icons = social_btn.find('>div'),
					quickSearch = menu.find('#quick_search'),
					search_btn = header.find('.v1-icon-search'),
					searchform = header.find('.searchform'),
					searchInput = header.find('.searchform input'),
					search_close = searchform.find('.cancel');

				var menuChange = new TimelineLite({
					paused: true,
					onStart: function() { },
					onReverseComplete: function() { }
				});

				// Fades in/out the logo + login/out link inside the menu/nav
				menuChange
					.add(TweenMax.to(menuAuth, 0.2, {
						autoAlpha: 1,
						onStart: function() {
							menuAuth.css('visibility', 'visible');
						},
						onReverseComplete: function() {
							menuAuth.css('visibility', 'hidden');
						}
					}));

				var stickyMenu = function() {
					if (win.width() > 1024) {
						var menuOffset = header.outerHeight() - menu.outerHeight();
						var scrollTop = win.scrollTop();
						if (scrollTop > menuOffset) {
							header.addClass('fixed');
							header.css('top', -menuOffset);
							mainDiv.css('margin-top', menuOffset + 35);
							menuChange.timeScale(1).pause().play();
						} else {
							header.removeClass('fixed');
							header.css('top', '');
							mainDiv.css('margin-top', '');
							menuChange.timeScale(1).pause().reverse();
						}

						// Sticky elements need to re-orient themselves
						$(document.body).trigger("sticky_kit:recalc");
					}
				};

				win.scroll(stickyMenu).trigger('scroll');

				var searchSubmit = function(form, event) {
					if (form.find('input').val().length) {
						form.parent().find('.v1-icon-search, .v1-icon-close').removeClass('v1-icon-search v1-icon-close').addClass('v1-icon-loading');
					} else if (event) {
						event.preventDefault();
					}
				};

				searchform.submit(function(e) { searchSubmit($(this), e); });
				search_btn.click(function() { searchform.submit(); });

				var mobileSearchInit = function() {
				  var toggle = header.find('.hp-header__main .v1-icon-search'),
						  fadeOverlay = mainDiv.find('.mobile-fade-overlay'),
							container = header.find('#mobile-quick-search'),
							form = container.find('form'),
							input = form.find('input'),
							clear = container.find('.v1-icon-close');

					form.submit(function(e) { searchSubmit($(this), e); });

					var displayAnimation = new TimelineLite({ paused: true });

					displayAnimation
						.add(TweenMax.to(container, 0.40, {
							height: 50,
							onStart: function() { container.css('display', 'block'); input.focus(); },
							onReverseComplete: function() { container.css('display', 'none'); }
						}))
						.add(TweenMax.to(fadeOverlay, 0.40, {
							autoAlpha: 0.85,
							onStart: function() { fadeOverlay.css('display', 'block'); },
							onReverseComplete: function() { fadeOverlay.css('display', 'none'); }
						}), 0);

					var toggleDisplay = function() {
						toggle.toggleClass('active');
						if (fadeOverlay.is(':visible')) {
							fadeOverlay.off('click');
							displayAnimation.timeScale(1).pause().reverse();
						} else {
							fadeOverlay.on('click', toggleDisplay);
							displayAnimation.timeScale(1).pause().play();
						}
					};

					toggle.click(toggleDisplay);

					input.keyup(function() {
						clear.toggle($(this).val().length > 0);
					});

					clear.click(function() {
						input.val('');
						$(this).hide();
					});
				};

				mobileSearchInit();
			}
		},
		mobileNavMenu: {
			selector: '#mobile-nav-menu',
			init: function() {
				var base = this,
				    $menu = $(base.selector),
            $menuContent = $menu.find('.menu-content'),
            $buttons = $('#mobile-nav-buttons'),
            $scrollShadow = $buttons.find('.scroll-shadow'),
            $header = $('#header'),
            $headerToggleButton = $header.find('[data-mobile-nav-menu-toggle]'),
            expandedClass = 'mobile-nav-menu-open';

        function toggleMenu(event) {
			    if (win.width() >= 768) {
			      return;
			    }

			    if (menuIsOpen()) {
			      closeMenu();
			    } else {
			      openMenu();
			    }

			    $menu.toggleClass(expandedClass);
			    $buttons.toggleClass(expandedClass);
			    $headerToggleButton.toggleClass(expandedClass);
			  }

			  function closeMenu() {
			    enableScroll();
			  }

			  function openMenu() {
			    disableScroll();
			    setMenuTop();
			    $menu.trigger('touchmove'); // initialize scroll "shadow" indicator
			  }

			  function menuIsOpen() {
			    return $menu.hasClass(expandedClass);
			  }

			  function setMenuTop() {
			    $menu.css({ top: menuTop() });
			  }

			  function menuTop() {
			    return ($header && $header.outerHeight() - win.scrollTop()) || 0;
			  }

			  function enableScroll() {
			    $('body').css({ height: '', overflow: '', position: '', width: '' });
			  }

			  // `position: fixed;` and `width: 100%` required for proper behavior on iOS Safari
			  function disableScroll() {
			    $('body').css({ height: '100%', overflow: 'hidden', position: 'fixed', width: '100%' });
			  }

			  function handleScrollShadow(event) {
			    var distanceFromBottom = $menuContent.outerHeight() - $menu.outerHeight() - $menu.scrollTop();

			    if (distanceFromBottom <= 0) {
			      $scrollShadow.fadeOut(200);
			    } else {
			      $scrollShadow.fadeIn(200);
			    }
			  }

			  function adjustMenuTop() {
			    if (menuIsOpen()) {
			      setMenuTop();
			    }
			  }

			  $(document).on('click', '[data-mobile-nav-menu-toggle]', toggleMenu);

			  $menu.on('touchmove', handleScrollShadow);

			  win.on('resize', adjustMenuTop);
			}
		},
		newsletterSubscribe: {
			selector: '[data-form-id*="newsletter-subscribe"]',
			init: function() {
				var base = this;

				function submitAsync($form) {
					$.ajax({
						method: "POST",
						url: $form.attr('action'),
						data: formData($form)
					});
				}

				function formData($form) {
					return _.object($form.serializeArray().map(function(pair) {
						return [pair.name, pair.value];
					}));
				}

				$(base.selector).on('submit', function(event) {
					event.preventDefault();

					submitAsync($(this));
				});
			}
		},
		responsiveNav: {
			selector: '#wrapper',
			init: function() {
				var base = this,
					container = $(base.selector),
					toggle = $('.mobile-toggle', '.header'),
					cc = $('.click-capture', '#content-container'),
					target = $('#mobile-menu'),
					parents = target.find('.thb-mobile-menu>li>a'),
					span = target.find('.thb-mobile-menu>li>span');

				toggle.on('click', function() {
					container.toggleClass('open-menu');
					return false;
				});

				cc.add(target.find('.close')).on('click', function() {
					container.removeClass('open-menu');
					parents.find('.sub-menu').hide();

					return false;
				});

				span.on('click', function(){
						var that = $(this),
								link = that.prev('a');

						parents.filter('.active').not(link).removeClass('active').parent('li').find('.sub-menu').slideUp();

						console.log(link.hasClass('active'));
						if (link.hasClass('active')) {
							console.log('remove');
							link.removeClass('active').parent('li').find('.sub-menu').slideUp();
						} else {
							console.log('add');
							link.addClass('active').parent('li').find('.sub-menu').slideDown();
						}

						return false;
				});

			}
		},
		categoryMenu: {
			selector: '#full-menu',
			init: function() {
				var base = this,
					container = $(base.selector),
					children = container.find('.menu-item-has-children');

				children.each(function() {
					var _this = $(this),
						menu = _this.find('>.sub-menu,>.thb_mega_menu_holder'),
						tabs = _this.find('.thb_mega_menu li'),
						contents = _this.find('.category-children>.row');

					tabs.first().addClass('active');
					_this.hoverIntent({
						over: function() {
							$('.header-separator').addClass('active');
							TweenLite.to(menu, 0.2, {autoAlpha: 1, ease: Quart.easeOut, onStart: function() { menu.css('display', 'block'); }});
						},
						out: function() {
							$('.header-separator').removeClass('active');
							TweenLite.to(menu, 0.2, {autoAlpha: 0, ease: Quart.easeOut, onComplete: function() { menu.css('display', 'none'); }});
						},
						timeout: 200 // required for when the menu crosses the grey separator that's outside of the selected divs
					});
					tabs.on('hover', function() {
						var _li = $(this),
							n = tabs.index(_li);

						tabs.removeClass('active');
						_li.addClass('active');
						contents.hide();
						contents.filter(':nth-child('+(n+1)+')').show();
					});
				});

				var resizeMegaMenu = _.debounce(function(){
					var parent = $('.header.style2').length ? $('.header_top') : container;
					children.find('.thb_mega_menu_holder').width(parent.outerWidth());
				}, 30);
				win.resize(resizeMegaMenu).trigger('resize');
			}
		},
		overlay: {
			selector: '.overlay-effect .overlay',
			init: function(el) {
				var base = this,
					container = $(base.selector),
					target = el ? el.find(base.selector) : container;

				target.each(function() {
					var _this = $(this),
						overlayInner = _this.find('.child'),
						overlayHover = new TimelineLite({ paused: true });

					TweenLite.set(overlayInner, {opacity: 0, y:50});

					overlayHover
						.add(TweenLite.to(_this, 0.5, {opacity:1, ease: Quart.easeOut}))
						.add(TweenMax.staggerTo(overlayInner,0.25, { y: 0, opacity:1, ease: Quart.easeOut}, 0.05), "-=0.25");

					_this.hoverIntent(function() {
						overlayHover.timeScale(1).play();
					}, function() {
						overlayHover.timeScale(1.6).reverse();
					});
				});
			}
		},
		fullHeightContent: {
			selector: '.full-height-content',
			init: function() {
				var base = this,
					container = $(base.selector);

				base.control(container);

				win.resize(_.debounce(function(){
					base.control(container);
				}, 50));

			},
			control: function(container) {
				var h = $('.header'),
						a = $('#wpadminbar'),
						ah = (a ? a.outerHeight() : 0);

				container.each(function() {
					var _this = $(this),
						height = win.height() - h.outerHeight() - ah;

					_this.css('min-height',height);

				});
			}
		},
		carousel: {
			selector: '.slick',
			init: function(el) {
				var base = this,
					container = el ? el : $(base.selector);

				container.each(function() {
					var that = $(this),
						columns = that.data('columns'),
						navigation = (that.data('navigation') === true ? true : false),
						autoplay = (that.data('autoplay') === false ? false : true),
						pagination = (that.data('pagination') === true ? true : false),
						autowidth = (that.data('autowidth') === true ? true : false),
						center = (that.data('center') ? that.data('center') : false);

					var args = {
						dots: pagination,
						arrows: navigation,
						infinite: true,
						speed: 1000,
						centerMode: center,
						slidesToShow: columns,
						slidesToScroll: 1,
						autoplay: autoplay,
						centerPadding: '50px',
						autoplaySpeed: 4000,
						pauseOnHover: true,
						prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
						nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
						responsive: [
							{
								breakpoint: 1025,
								settings: {
									slidesToShow: (columns < 3 ? columns : 3),
									centerPadding: '40px'
								}
							},
							{
								breakpoint: 780,
								settings: {
									slidesToShow: (columns < 2 ? columns : 2),
									centerPadding: '30px'
								}
							},
							{
								breakpoint: 640,
								settings: {
									slidesToShow: 1,
									centerPadding: '15px'
								}
							}
						]
					};
					that.slick(args);

				});
			}
		},
		masonry: {
			selector: '.masonry',
			init: function() {
				var base = this,
				container = $(base.selector);

				container.each(function() {
					var that = $(this),
						el = that.children('.item'),
						org = [],
						page = 1;

					TweenLite.set(el, {opacity: 0, y:100});
					that.imagesLoaded(function() {
						that.isotope({
							itemSelector : '.item',
							transitionDuration : 0,
							masonry: {
								columnWidth: '.grid-sizer'
							}
						}).isotope( 'once', 'layoutComplete', function(i,l) {
							org = _.pluck(l, 'element');
						});
						that.isotope('layout');
						win.scroll(_.debounce(function(){
							if (that.is(':in-viewport')) {
								TweenMax.staggerTo(org, 1, { y: 0, opacity:1, ease: Quart.easeOut}, 0.25);
							}
						}, 50)).trigger('scroll');

					});
				});
			}
		},
		shareArticleDetail: {
			selector: '.share-article, .share-article-loop, .hp-share-icon',
			init: function() {
				var base = this,
					container = $(base.selector);

				container.find('.social').on('click', function() {
					var left = (screen.width/2)-(640/2),
							top = (screen.height/2)-(440/2)-100;
					window.open($(this).attr('href'), 'mywin', 'left='+left+',top='+top+',width=640,height=440,toolbar=0');
					return false;
				});
			}
		},
		parallax_bg: {
			selector: 'body',
			init: function() {
				var base = this,
					container = $(base.selector);
				if(!Modernizr.touch){
					$.stellar({
						horizontalScrolling: false,
						verticalOffset: 40,
						responsive: true
					});
				}
			},
			refresh: function() {
				if(!Modernizr.touch){
					$.stellar('refresh');
				}
			}
		},
		custom_scroll: {
			selector: '.custom_scroll',
			init: function() {
				var base = this,
					container = $(base.selector);

				container.each(function() {
					var _this = $(this);

					new IScroll('#'+_this.attr('id'), {
						scrollbars: true,
						mouseWheel: true,
						click: true,
						interactiveScrollbars: true,
						shrinkScrollbars: 'scale',
						fadeScrollbars: true
					});
					_this.on('touchmove', function (e) { e.preventDefault(); });
				});

			}
		},
		magnificImage: {
			selector: '[rel="magnific"], .wp-caption a',
			init: function() {
				var base = this,
						container = $(base.selector),
						stype;

				container.each(function() {
					if ($(this).hasClass('video')) {
						stype = 'iframe';
					} else {
						stype = 'image';
					}
					$(this).magnificPopup({
						type: stype,
						closeOnContentClick: true,
						fixedContentPos: true,
						closeBtnInside: false,
						closeMarkup: '<button title="%title%" class="mfp-close"></button>',
						mainClass: 'mfp',
						removalDelay: 250,
						overflowY: 'scroll',
						image: {
							verticalFit: false
						}
					});
				});

			}
		},
		magnificInline: {
			selector: '[rel="inline"]',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var eclass = ($(this).data('class') ? $(this).data('class') : '');

					$(this).magnificPopup({
						type:'inline',
						midClick: true,
						mainClass: 'mfp ' + eclass,
						removalDelay: 250,
						alignTop: true,
						closeBtnInside: true,
						closeMarkup: '<button title="%title%" class="mfp-close"></button>'
					});
				});

			}
		},
		magnificGallery: {
			selector: '[rel="gallery"]',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					$(this).magnificPopup({
						delegate: 'a',
						type: 'image',
						closeOnContentClick: true,
						fixedContentPos: true,
						mainClass: 'mfp',
						removalDelay: 250,
						closeBtnInside: false,
						overflowY: 'scroll',
						gallery: {
							enabled: true,
							navigateByImgClick: false,
							preload: [0,1] // Will preload 0 - before current, and 1 after the current image
						},
						image: {
							verticalFit: false,
							titleSrc: function(item) {
								return item.el.attr('title');
							}
						}
					});
				});

			}
		},
		lightboxGallery: {
			selector: '.gallery-link',
			init: function(parentPostURL) {
				var base = this,
						container = $(base.selector);
				// Use passed-in url from location change or whatever is in the browser
				var parentUrl = (parentPostURL || window.location.href);
				// Remove the gallery_id param (if present)
				parentUrl = parentUrl.replace(/\?gallery_id=[^&]*&*/, '?');
				parentUrl = parentUrl.replace(/&gallery_id=[^&]*/, '');
				// Remove possible trailing ? and/or / (in either order)
				parentUrl = parentUrl.replace(/\/*\?*\/*$/, '');

				function parentUrlWithGalleryId(id) {
					if (/\?/.test(parentUrl)) {
						return parentUrl + "&gallery_id=" + id;
					} else {
						return parentUrl + "?gallery_id=" + id;
					}
				}

				function loadImage(container) { // Lazy load the images
					var img = container.src.find('img[class^="attachment-"]'),
						  imgSrc = img.attr('data-src');

					img.attr('src', imgSrc);
					img.removeAttr('data-src');
				}

				container.each(function() {
					var _this = $(this),
						eclass = ($(this).data('class') ? $(this).data('class') : ''),
						items = [],
						target = $( _this.attr('href') ),
						showOnLoad = false,
						startIndex = -1;

					target.find('.post-gallery-content').each(function(index) {
						if ($(this).data('show-on-load')) {
							showOnLoad = true;
							startIndex = index;
						}

						items.push({
							src: $(this),
							permalink: $(this).data('gallery-permalink'),
							galleryId: $(this).data('gallery-id'),
						});
					});

					function loadPopup(index) {
						index = index || 0;
						var startWindowScroll;

						$.magnificPopup.open({
							midClick: true,
							mainClass: 'mfp ' + eclass,
							alignTop: true,
							fixedContentPos: true,
							closeBtnInside: true,
							items: items,
							gallery: {
								enabled: true
							},
							closeMarkup: '<button title="%title%" class="mfp-close"></button>',
							callbacks: {
								beforeOpen: function() {
									// Save the current scroll position
									startWindowScroll = win.scrollTop();
									// Make viewport appear to be only as large as the popup
									$('body').css({ 'overflow': 'hidden' });
								},
								open: function() {
									history.replaceState( null, null, parentUrlWithGalleryId($.magnificPopup.instance.currItem.data.galleryId) );

									$.each(items, function(index, img) { loadImage(img); });

									$(".lightbox-close, .gallery-back-to-article").on('click',function(){
										$.magnificPopup.instance.close();
										return false;
									});

									$(".arrow.prev").on('click',function(){
										$.magnificPopup.instance.prev();
										return false;
									});

									$(".arrow.next").on('click',function(){
										$.magnificPopup.instance.next();
										return false;
									});

									$('.image-container').swipe( {
										swipeLeft: swipeNav,
										swipeRight: swipeNav
									});

									mobileScroll($.magnificPopup.instance.wrap, $.magnificPopup.instance.currItem.data.src);
								},
								close: function() {
									history.replaceState( null, null, parentUrl); // set the permalink to the gallery
									$('body').css({ 'overflow': '' });
									// reset scroll position to what it was before popup opened
									win.scrollTop(startWindowScroll);

									// Make sure we don't keep adding listeners upon close
									$(".arrow.next").off('click');
									$(".arrow.prev").off('click');
									$(".lightbox-close").off('click');
								},
								change: function() {
									// update url when new image is loaded
									history.replaceState( null, null, parentUrlWithGalleryId($.magnificPopup.instance.currItem.data.galleryId) );

									mobileScroll($.magnificPopup.instance.wrap, $.magnificPopup.instance.currItem.data.src);
								}
							}
						}, index);
						return false;
					}

					function swipeNav(event, direction) {
						if (win.width() < 640) { // $break-small breakpoint
							if (direction === "left") {
								$.magnificPopup.instance.next();
							} else if (direction === "right") {
								$.magnificPopup.instance.prev();
							}
						}
					}

					function mobileScroll(scrollArea, container) {
						scrollArea.off('scroll');

						var nav = container.find('.gallery-nav-mobile'),
								navHeight = nav.outerHeight(),
								header = container.find('.lightbox-header'),
								headerHeight = header.outerHeight(),
								siblingBelow = nav.next();

						var stickyNav = function() {
							// When the magnificPopup "change" event fires, the elements are not visible and
							// so their height is initially 0.  I'm sure there's a better way to get around this!
							navHeight = navHeight || nav.outerHeight();
							headerHeight = headerHeight || header.outerHeight();

							if (win.width() < 640) {  // $break-small breakpoint
								if (scrollArea.scrollTop() > headerHeight) {
									nav.addClass('fixed');
									siblingBelow.css('margin-top', navHeight);
								} else {
									nav.removeClass('fixed');
									siblingBelow.css('margin-top', '');
								}
							}
						};

						scrollArea.on('scroll', stickyNav);
					}

					// Load the popup on click
					_this.on('click', function() {
						loadPopup();
					});

					if (showOnLoad && startIndex > -1) {
						loadPopup(startIndex);
					}

					// Load the popup when clicking the main story image
					$('.post-gallery > img').first().on('click', function() {
						loadPopup();
					});
				});
			}
		},
		articleScroll: {
			selector: '#infinite-article',
			org_post_url: window.location.href,
			org_post_title: document.title,
			init: function() {
				var base = this,
						container = $(base.selector),
						on = container.data('infinite'),
						org = container.find('.post-detail:first-child'),
						id = org.data('id'),
						tempid = id,
						footer = $('#footer').outerHeight() + $('#subfooter').outerHeight();

				var scrollLocation = _.debounce(function(){
						base.location_change();
					}, 20);

				var scrollAjax = _.debounce(function(){
					if (win.scrollTop() >= ($doc.height() - win.height() - footer - 200)) {
						container.addClass('thb-loading');

						if (id === tempid) {
							$.ajax( themeajax.url, {
								method : 'POST',
								data : {
									action : 'thb_infinite_ajax',
									post_id : tempid
								},
								beforeSend: function() {
									id = null;
								},
								success : function(data) {
									var d = $.parseHTML(data);
									container.removeClass('thb-loading');

									if (d) {
										id = $(d).find('.post-detail').data('id');
										tempid = id;

										$(d).appendTo(container).hide().imagesLoaded(function() {
											$(d).show();
											SITE.carousel.init($(d).find('.slick'));
											SITE.equalHeights.init($(d).find('[data-equal]'));
											SITE.fixedPosition.init($(d).find('.fixed-me'));
											SITE.parallax_bg.refresh();
											SITE.lightboxGallery.init($(d).find('.post-detail').data('url'));
										});

									} else {
										id = null;
									}
								}
							});
						}
					}
				}, 100);

				if (on === 'on') {
					win.scroll(scrollLocation);
					win.scroll(scrollAjax);
				}
			},
			location_change: function() {
				var base = this,
						container = $(base.selector);

				var windowTop           = win.scrollTop(),
						windowBottom        = windowTop + win.height(),
						windowSize          = windowBottom - windowTop,
						setsInView          = [],
						pageChangeThreshold = 0.5,
						post_title,
						post_url;

				$('.post-detail-row').each( function() {
					var _row = $(this),
							post = _row.find('.post-detail'),
							id				= post.data( 'id' ),
							setTop			= _row.offset().top,
							setHeight		= _row.outerHeight(true),
							setBottom		= 0,
							tmp_post_url	= post.data('url'),
							tmp_post_title	= post.find('.post-title h1').text();

					// Determine position of bottom of set by adding its height to the scroll position of its top.
					setBottom = setTop + setHeight;

					if ( setTop < windowTop && setBottom > windowBottom ) { // top of set is above window, bottom is below
						setsInView.push({'id': id, 'top': setTop, 'bottom': setBottom, 'post_url': tmp_post_url, 'post_title': tmp_post_title, 'alength' : setHeight });
					}
					else if( setTop > windowTop && setTop < windowBottom ) { // top of set is between top (gt) and bottom (lt)
						setsInView.push({'id': id, 'top': setTop, 'bottom': setBottom, 'post_url': tmp_post_url, 'post_title': tmp_post_title, 'alength' : setHeight });
					}
					else if( setBottom > windowTop && setBottom < windowBottom ) { // bottom of set is between top (gt) and bottom (lt)
						setsInView.push({'id': id, 'top': setTop, 'bottom': setBottom, 'post_url': tmp_post_url, 'post_title': tmp_post_title, 'alength' : setHeight });
					}
				});

				// Parse number of sets found in view in an attempt to update the URL to match the set that comprises the majority of the window
				if ( 0 === setsInView.length ) {
					post_url = base.org_post_url;
					post_title = base.org_post_title.substring(0,40)+"...";
				} else if ( 1 === setsInView.length ) {
					var setData = setsInView.pop();

					post_url = setData.post_url;
					post_title = setData.post_title.substring(0,40)+"...";

					base.borderWidth(setData.top, setData.alength);
				} else {
					post_url = setsInView[0].post_url;
					post_title = setsInView[0].post_title.substring(0,40)+"...";
					base.borderWidth(setsInView[0].top, setsInView[0].alength);
				}

				base.updateURL(post_url, post_title);
			},
			updateURL : function(post_url, post_title) {
				if( window.location.href.split('?')[0] !== post_url ) { // make sure we don't replaceState on the original url if parameters
					if ( post_url !== '' ) {
						history.replaceState( null, null, post_url );
						document.title = post_title;
						$('#page-title').html(post_title);
					}

				}
			},
			borderWidth : function(top, setHeight) {
				var windowTop = win.scrollTop(),
						perc = (windowTop - top + ($('.header.fixed').outerHeight() + $('#wpadminbar').outerHeight())) / setHeight;

				$('.progress', '.header').css({ width: parseInt(perc*100, 10) + '%' });
			}
		},
		parsley: {
			selector: '.comment-form, .wpcf7-form',
			init: function() {
				var base = this,
						container = $(base.selector);

				if ($.fn.parsley) {
					container.parsley();
				}
			}
		},
		equalHeights: {
			selector: '[data-equal]',
			init: function(el) {
				var base = this,
						container = el ? el : $(base.selector);

				container.each(function(){
					var that = $(this),
							children = that.data("equal");

					that.find(children).matchHeight(true);
					that.waitForImages(function() {
						that.find(children).matchHeight(true);
					});

				});
			}
		},
		fixedPosition: {
			selector: '.fixed-me',
			init: function(el) {
				var base = this,
					container = el ? el : $(base.selector),
					a = $('#wpadminbar'),
					ah = (a ? a.outerHeight() : 0);

				container.each(function() {
					var _this = $(this),
							style2 = _this.hasClass('style2'),
							off = $('.single-post').length ? (80 + (style2 ? 50 : 0 )) : 80;
					_this.stick_in_parent({
						offset_top: off + ah
					});

				});

				win.resize(_.debounce(function(){
					$(document.body).trigger("sticky_kit:recalc");
				}, 10));
				win.scroll(_.debounce(function(){
					$(document.body).trigger("sticky_kit:recalc");
				}, 50));
			}
		},
		animation: {
			selector: '.animation',
			init: function() {
				var base = this,
						container = $(base.selector);

				base.control(container);

				win.scroll(function(){
					base.control(container);
				});
			},
			control: function(element) {
				var t = -1;


				element.filter(':in-viewport').each(function () {
					var that = $(this);
						t++;

					setTimeout(function () {
						that.addClass("animate");
					}, 200 * t);

				});
			}
		},
		toTop: {
			selector: '#scroll_totop',
			init: function() {
				var base = this,
					container = $(base.selector);

				container.on('click', function(){
					TweenMax.to(window, win.height() / 1000, {scrollTo:{y:0}, ease:Quart.easeOut});
					return false;
				});
				win.scroll(_.debounce(function(){
					base.control();
				}, 50));
			},
			control: function() {
				var base = this,
					container = $(base.selector);

				if (($doc.height() - (win.scrollTop() + win.height())) < 300) {
					TweenMax.to(container, 0.2, { autoAlpha:1, ease: Quart.easeOut });
				} else {
					TweenMax.to(container, 0.2, { autoAlpha:0, ease: Quart.easeOut });
				}
			}
		},
		notification: {
			selector: '.notification',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var that = $(this);
					that.on('click', function() {
						that.fadeOut(200);
					});
				});
			}
		},
		promotionBanner: {
			selector: '.promotion-banner',
			init: function() {
				// copied from hive-api: app/assets-2018/javascripts/static_elements/promotion_banner.js.es6

				var base = this,
				    isMobile = window.matchMedia ? window.matchMedia("only screen and (max-width: 760px)") : false;

				if (isMobile && isMobile.matches) {
					$(".promotion-banner a").on("click", function(e) {
						if ($(".promotion-banner__tooltip-templates").css("display") === "block") {
							$(".promotion-banner__tooltip-templates").css("display", "none");
						} else {
							$(".promotion-banner__tooltip-templates").css("display", "block");
						}
					});
			  } else {
					if ($.tooltipster !== undefined) {
						$(".promotion-banner__tooltip").tooltipster({
							theme: 'tooltipster-light',
							trigger: 'click',
							maxWidth: 334
						});
					}
				}
			}
		}
	};

	$doc.ready(function() {
		if (!window.thb_init) {
			SITE.init();
		}
	});

})(jQuery, this, _);