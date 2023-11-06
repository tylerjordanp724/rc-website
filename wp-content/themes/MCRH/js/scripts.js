jQuery(document).ready(function($) {
	// Remove the loading class to enable transitions
	$('body').removeClass('loading');





	// fitVid plugin

	$("#vid1").fitVids({ customSelector: "div[class^='video-js-wrapper']"});


	// Initializing Isotope plugin

	var $container = $('#container');
	// init
	$container.isotope({
	  // options
	  itemSelector: '.item',
	  layoutMode: 'fitRows',
	});

	$('.filter-button').click(function(){
		console.log('clicked');
  		var filterValue = $(this).attr('data-filter');
  		$container.isotope({ filter: filterValue });
	});


	// Playing Video with Video.js plugin
	videojs('vid1', { "techOrder": ["youtube"]}).ready(function() {
	  
	  var myPlayer = this;

	  $.ajaxSetup({ cache: false });

	  $('.post-link').on('click', function(e){
		  e.preventDefault();
			var post_link = $(this).attr('href'),
			    $vidID = $(this).find('.youtube-id').text();

		//$('html, body').animate({scrollTop: 0}, 500);
		//$('.slide-down').slideDown(500);
		//$('.video-play-wrap').fadeIn('linear');
		//$('.about-info, .bio-info').hide();
		//$('li.bio-btn, li.about-btn').removeClass('clicked');


			$('.post-content').html('content loading');
			$('.post-content').load(post_link);

    	  myPlayer.src('http://www.youtube.com/watch?v='+$vidID);
			myPlayer.play();

	  });

  	});

	// Hiding these two sections before the video players shows
  	$('.about-info, .bio-info').hide();

  	// Video player appears when the page loads
  	$('.slide-down').show();





  	// Page Refresh on click

  	$('.logo').click(function(){
  		location.reload();
  	});

	// Toggling hidden sections

	$('li.about-btn').click(function(){
		$('html, body').animate({scrollTop: 0}, 500);
		$('li.bio-btn').removeClass('clicked');
		$(this).addClass('clicked');
		$('.slide-down').slideDown(500);
		$('.bio-info, .video-play-wrap').hide();
		$('.about-info').fadeIn();
		$(".video-js")[0].player.pause();
				
	});

	$('li.bio-btn').click(function(){
		$('html, body').animate({scrollTop: 0}, 500);
		$('li.about-btn').removeClass('clicked');
		$(this).addClass('clicked');
		$('.slide-down').slideDown(500);
		$('.about-info, .video-play-wrap').hide();
		$('.bio-info').fadeIn();
		$(".video-js")[0].player.pause();	
	});


	//Close hidden sections

	$('.close-btn').click(function(){
		$('.slide-down').slideUp(500);
		$('li.bio-btn, li.about-btn').removeClass('clicked');
		$(".video-js")[0].player.pause();
	});

	$('li.vid').hover(
		function(){
			$(this).children('.vid-overlay').stop().fadeIn('speed');
		},

		function(){
			$(this).children('.vid-overlay').stop().fadeOut('speed');
		}
	);

	$(window).resize(function(){
		if($(window).width() <= 1080){
			$('.vid-overlay').hover().stop(true, true);
		}
	});

	// Drop-Down Sort Menu

	$('li.sort-list').hover(function(){
			$(this).children('ul.category-list').stop().slideDown('speed');
		},
		function(){
			$(this).children('ul.category-list').stop().slideUp('speed');
		}
	);


	//Responsive Menu

	$('.menu-btn').click(function(){
		$('header').animate({left:"280px"}, 500);
		$('.slide-down').children().animate({left:"280px"}, 500);
		$('nav.main-nav ul, .vid-sort').animate({left:"0px"}, 500);	
		$('#container').animate({left:"280px"}, 500);
		$('.footer-content').animate({left:"280px"}, 500);
	});

	$('.slide-down').click(function(){
		$('header').animate({left:"0px"}, 500);
		$('nav.main-nav ul, .vid-sort').animate({left:"-280px"}, 500);
		$('.slide-down').children().animate({left:"0px"}, 500);
		$('#container').animate({left:"0px"}, 500);
		$('.footer-content').animate({left:"0px"}, 500);
	});
});