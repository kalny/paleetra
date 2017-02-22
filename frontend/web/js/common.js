$(function() {

	//$('.main-header').css('min-height', $(window).height());

	$('#menubutton').click(function(){
		$('.main-menu').toggle();
	});

	$('.phoneme-popup-link').magnificPopup({
		type: 'inline',
		focus: '#phonenumberfield'
		// other options
	});

	if ($(window).width() >= 768) {
		$(".card").equalHeights();

		$("#for-what").waypoint(function(){
			$('.card-1').addClass('animated fadeInLeft');
			$('.card-3').addClass('animated fadeInRight');
		}, {offset: "90%"});
	}

	$('.fade-in-up-block').waypoint(function(){
		$(this.element).addClass('animated fadeInUp');
	}, {offset: "100%"});

	$('.fade-in-right-block').waypoint(function(){
		$(this.element).addClass('animated fadeInRight');
	}, {offset: "100%"});

	$('.fade-in-left-block').waypoint(function(){
		$(this.element).addClass('animated fadeInLeft');
	}, {offset: "100%"});

	$('.price-arrow').waypoint(function(){
		$(this.element).addClass('animated fadeInDown');
	}, {offset: "100%"});

	

	/*Timeline*/

	var left = $('.timeline-wrapper ul').position().left;
	var top = $('.vline').position().top;
	var height = $('.vline').height();

	$('.vline').css('left', left + 28);
	$('.vline').css('top', top + 50);
	$('.vline').css('height', height - 80);

	$('.button-up').css('line-height', $(window).height() + 'px');

	var top_show = 150;

	if ($(window).width() > 820) {
		$(window).scroll(function () {
			if ($(this).scrollTop() > top_show) $('.button-up').fadeIn();
			else $('.button-up').fadeOut();
		});
	}
	


	if ($(window).width() > 768) {
		var $blocks = $('.price-item');
		$blocks.each(function(){
			$content = $(this).find('.price-content');

			$(this).css('height', $content.height() + 30);
			$($content).css('position', 'absolute');

			if ($content.hasClass('price-content-left')) {	
				var left = $content.offset().left;
				$($content).css('left', -left+15);
				$($content).css('padding-left', left+20);
			}

			if ($content.hasClass('price-content-right')) {
				var right = $content.offset().left + $content.width();
				$($content).css('right', -right);
				$($content).css('padding-right', right+20);
			}
			
		});
	}

	$('#portfolio_grid').mixItUp();

	$('.popup-content').magnificPopup({
		type: 'inline',
		midClick: true
		//focus: '#phonenumberfield'
		// other options
	});

	$('.portfolio-item').each(function(i){
		$(this).find('.popup-content').attr('href', '#work_' + i);
		$(this).find('.port-descr').attr('id', 'work_' + i);
	});


	$('.imgbox').each(function() {
	  //set size
	  var th = $(this).height(),//box height
	      tw = $(this).width(),//box width
	      im = $(this).children('img'),//image
	      ih = im.height(),//inital image height
	      iw = im.width();//initial image width
	  if (ih>iw) {//if portrait
	      im.addClass('ww').removeClass('wh');//set width 100%
	  } else {//if landscape
	      im.addClass('wh').removeClass('ww');//set height 100%
	  }
	  //set offset
	  var nh = im.height(),//new image height
	      nw = im.width(),//new image width
	      hd = (nh-th)/2,//half dif img/box height
	      wd = (nw-tw)/2;//half dif img/box width
	  if (nh<nw) {//if portrait
	      im.css({marginLeft: '-'+wd+'px', marginTop: 0});//offset left
	  } else {//if landscape
	      im.css({marginTop: '-'+hd+'px', marginLeft: 0});//offset top
	  }
	});

	$('.slider').owlCarousel({
		items: 1,
		//itemsDesktop : [1199, 1],
		//itemsDesktopSmall : [979, 1],
		//itemsTablet : [768, 1],
		//itemsMobile : [479, 1],
		singleItem : true,
		autoPlay : true,
    stopOnHover : true,
    //navigation : true,
	});


	var hashtag = window.location.hash;

	if(hashtag !== '') {
		top = $(hashtag).offset().top ;

		if (hashtag === '#reviews' || hashtag === '#contacts') top += 400;
		$('body,html').animate({scrollTop: top}, 1000);
	}

	/*Scroll*/
	
	$(".control").click(function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
		top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1000);
	});
	
});
