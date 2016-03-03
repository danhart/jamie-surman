var currentPage = 'portfolio';

var core = {

	init: function() {
		
		core.siteload();
		core.windowheight();
		core.arrowsclick();
		core.changepage();		
		core.thumbsmargin();
		core.thumbsbutton();
		core.thumbsfade();
		core.thumbclick();
		core.sortimages();
		
	},

	thumbsmargin: function() {
		$("#thumbnails_section ul > :nth-child(5n+5)").css("margin-right", 0);
	},
	
	thumbsbutton: function() {
		$('#thumbnails_section ul').hide();
		
		$('#thumbnails_button').click(function(event) {
																					 
			event.preventDefault();
			
			if ( $('#thumbnails_button').hasClass('active') ) {
				core.thumbsfadeOut(false);
			} else {
				core.thumbsfadeIn();
			}
			
		});
		
	},
	
	thumbsfadeIn: function() {
		
		var thedelay = 0;
		
		$('#thumbnails_section ul li').each(function(index) {
					
			if (index === 0) {
			
				$('#thumbnails_button').addClass('active');
				
				$('#thumbnails_section ul').show();
				
				$('html, body').animate({
					scrollTop: $('#global_nav').offset().top - 28
				}, 1000);
			}
			
			$(this).delay(thedelay).fadeTo('normal', 1.0);
	
			thedelay += 80;
			
		});
	},
	
	thumbsfadeOut: function(no_scroll) {
		
		var numberofthumbs = $('#thumbnails_section ul li').length;
				
		$('#thumbnails_section ul li').each(function(index) {

			$(this).stop(true, true).fadeTo('normal', 0, function() {
				
				if (index + 1 ==  numberofthumbs) {
					
					$('#thumbnails_button').removeClass('active');
					
					if (no_scroll) {
						$('#thumbnails_section ul').hide();
					} else {
						$('html, body').animate({
							scrollTop: $('#top_padding_section').offset().top
						}, 1000, function() {
							$('#thumbnails_section ul').hide();
						});
					}
					
				}
				
			});
			
		});
		
	},
	
	thumbsfade: function() {
		$('#thumbnails_section ul li a').hover(function() {
			$('#thumbnails_section ul li a').not(this).stop().fadeTo('normal', 0.6);
		},function() {
			$('#thumbnails_section ul li a').not(this).stop().fadeTo('normal', 1);
		});
	},
	
	thumbclick: function() {
		
		$('img.ajaxloadergif').hide();
		
		$('#thumbnails_section ul li a').click(function(event) {
			event.preventDefault();
			
			$('html, body').animate({
				scrollTop: $('#top_padding_section').offset().top
			}, 1000);
			
			
			$(this).parent().addClass('selected').siblings().removeClass('selected');
			
			var newsrc = $(this).attr('href');
			
			core.swapimage(newsrc);
			
		});
	},
	
	arrowsclick: function() {
		$('#right_arrow_button').click(function(event) {
			event.preventDefault();
			
			var nextimage = $('#thumbnails_section ul li.selected').next();
		
			if (nextimage.length == 0) {
				var nextimage = $('#thumbnails_section ul li').first();
			}
			
			nextimage.addClass('selected').siblings().removeClass('selected');
			
			var newsrc = nextimage.find('a').attr('href');
			
			core.swapimage(newsrc);
			
		});
		
		$('#left_arrow_button').click(function(event) {
			event.preventDefault();
			
			var nextimage = $('#thumbnails_section ul li.selected').prev();
			
			if (nextimage.length == 0) {
				var nextimage = $('#thumbnails_section ul li').last();
			}
			
			nextimage.addClass('selected').siblings().removeClass('selected');
			
			var newsrc = nextimage.find('a').attr('href');
			
			core.swapimage(newsrc);
			
		});
	},
	
	swapimage: function(newsrc) {
		
		if ( newsrc != $("#mainimage").attr('src') ) {
		
			var fadeOutComplete = false;
			var newLoadComplete = false;
			
			$('#mainimage').fadeOut('fast', function() {
																							 
				$('img.ajaxloadergif').fadeIn('fast');
		
				fadeOutComplete = true;
				
				// If the image has loaded then lets fade it in straight away
				
				if (newLoadComplete) {
					$('img.ajaxloadergif').hide();
					$("#mainimage").attr('src', newsrc);
					$('#mainimage').fadeIn('fast');
				}	
				
			});
			
			$('<img />').attr('src', newsrc).load(function() {
			
				// Need an if here to detect if our container div contains an img element, if not then we should add it here I think
				// if ( $('#main_image_section').find('img').length == 0 ) { we didn't find it so we should add it }
				// $('.profile').append( $(this) );
				
				newLoadComplete = true;
				
				// If the fadeout has completed then lets fade the image in now
				// alert(typeof fadeOutComplete);
				
				if (fadeOutComplete) {
					$('img.ajaxloadergif').hide();
					$("#mainimage").attr('src', newsrc);
					$('#mainimage').fadeIn('fast');
				}
			
			});
		
		}
		
	},
	
	changepage: function() {
		
		$('#gn_portfolio a').click(function(event) {
																			
			event.preventDefault();
			
			if (currentPage != 'portfolio') {
				currentPage = 'portfolio';
				$('#global_nav').attr('class', currentPage);
				
				$('#contact_div:visible').fadeOut();
				$('#left_arrow_button:hidden, #right_arrow_button:hidden, #thumbnails_button:hidden, #mainimage:hidden').fadeIn();
			
			}
			
		});
		
		
		$('#gn_contact a').click(function(event) {
			
			event.preventDefault();
			
			if (currentPage != 'contact') {
				currentPage = 'contact';
				$('#global_nav').attr('class', currentPage);
			
				if ( $('#thumbnails_button').hasClass('active') ) {
					core.thumbsfadeOut(true);
				}
				
				var contactimage = $('#thumbnails_section ul li.contact');
				contactimage.addClass('selected');
				var newsrc = contactimage.find('a').attr('href');
				
				contactimage.addClass('selected').siblings().removeClass('selected');
				
				core.swapimage(newsrc);
				
				$('#left_arrow_button:visible, #right_arrow_button:visible, #thumbnails_button:visible').fadeOut();
				$('#contact_div:hidden').fadeIn();
				
				// Fade out other page elements
			}
			
		});
		
	},
	
	windowheight: function() {
		
		if ($(window).height() < 793) {
			$('#top_padding_section').height('4%');
			$('#white_section, #main_image_section, #mainimage').height('515px');
			$('img.ajaxloadergif').css('top', '50%').css('left', '50%');
		}
		
		$(window).resize(function() {
			if ($(window).height() < 793) {
				$('#top_padding_section').height('4%');
				$('#white_section, #main_image_section, #mainimage').height('515px');
				$('img.ajaxloadergif').css('top', '50%').css('left', '50%');
			} else {
				$('#top_padding_section').height('12%');
				$('#white_section, #main_image_section, #mainimage').height('592px');
				$('img.ajaxloadergif').css('top', '50%').css('left', '50%');
			}
		});
		
	},
	
	siteload: function() {
		
		if ($('#mainimage').length != 0) {
		
			$('#global_nav ul, #left_arrow_button, #right_arrow_button, #thumbnails_button, #mainimage').hide();
	
			var homeimage = $('#thumbnails_section ul li.home');
			homeimage.addClass('selected');
			var newsrc = homeimage.find('a').attr('href');
			
			$('<img />').attr('src', newsrc).load(function() {
	
				$('#mainimage').attr('src', newsrc);	
				$('#global_nav ul, #left_arrow_button, #right_arrow_button, #thumbnails_button, #mainimage').fadeIn('slow');
			
			});
			
		}
				
	},
	
	sortimages: function() {
		
		$('#reorder_thumbnails_section > ul').sortable({
			placeholder: 'ui-state-highlight',
			stop: function(i) {
				// alert($('#reorder_thumbnails_section > ul').sortable('serialize'));
				$.get('?page=blank&x=reorderthumbs&' + $('#reorder_thumbnails_section > ul').sortable('serialize'));
			}
		});
		
		$('#reorder_thumbnails_section > ul').disableSelection();
		
	},
	
};