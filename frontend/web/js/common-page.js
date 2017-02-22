$(function() {

	$('#menubutton').click(function(){
		$('.main-menu').toggle();
	});

	$('.phoneme-popup-link').magnificPopup({
		type: 'inline',
		focus: '#phonenumberfield'
		// other options
	});

	$('.fade-in-up-block').waypoint(function(){
		$(this.element).addClass('animated fadeInUp');
	}, {offset: "100%"});

	$('.fade-in-right-block').waypoint(function(){
		$(this.element).addClass('animated fadeInRight');
	}, {offset: "100%"});

	$('.fade-in-left-block').waypoint(function(){
		$(this.element).addClass('animated fadeInLeft');
	}, {offset: "100%"});

	/*Scroll*/
	

	$('.button-up').css('line-height', $(window).height() + 'px');

	var top_show = 150;

	if ($(window).width() > 820) {
		$(window).scroll(function () {
			if ($(this).scrollTop() > top_show) $('.button-up').fadeIn();
			else $('.button-up').fadeOut();
		});
	}

	$('.popup-content').magnificPopup({
		type: 'inline',
		midClick: true
		//focus: '#phonenumberfield'
		// other options
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

	$(".control").click(function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
		top = $(id).offset().top;
		console.log(top);
		$('body,html').animate({scrollTop: top}, 1000);
	});
	
});