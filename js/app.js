// circnav.js

function cnInit(){
	jQuery("div.circnav").each(function () {
		var size = jQuery(this).data("cnsize");
		var spacing = jQuery(this).data("cnspace");
		var offset = jQuery(this).data("cnoffset");

		jQuery(this).children("ul").each(function (){
			var width = jQuery(this).children().length;
			var angle = size/width-spacing+((360-spacing)>size?(spacing/width):0);
			jQuery(this).children().each(function (index) {
				jQuery(this).css("transform", "rotate("+(index*(angle+spacing)-offset)+"deg) skew("+(90-angle)+"deg)");
				jQuery(this).children("a").css("transform", "skew(-"+(90-angle)+"deg) rotate(-"+(90-angle/2)+"deg)");
			});
		});
	});
}

var transitioning = false;

function cnToggle(a){
	if (!transitioning) {
		transitioning = true;
		var theSlider = jQuery(a).parent();
		var tparent = theSlider.parent();

		var yeah = tparent.hasClass('collapse');

		if (yeah) tparent.removeClass('collapse');

		var g = theSlider.children('ul').children('li').children('a');
		g.each(function(index){
			jQuery(this).delay(100*index).queue(function(){
	    		if (!yeah) jQuery(this).removeClass('open').dequeue();
	    		else jQuery(this).addClass('open').dequeue();

	    		if (index+1==g.length) {
	    			transitioning = false;
	    			if (!yeah) tparent.addClass('collapse').dequeue();
	    		}
			});

	    });
	}

}

// tslider.js

function tsDetermine() {
	jQuery('#tsBox').each(function() {
		var theSlider = jQuery(this).children('div.headline-slider');
		var theChildren = theSlider.children('ul.slides');
		if (theChildren.length > 0 && theChildren.get(0).scrollWidth <= theSlider.innerWidth()){
			jQuery(this).addClass('noscroll');
		} else {
			jQuery(this).removeClass('noscroll');
		}
	});


}
function tsInit() {
	if (jQuery('#tsBox').data('tsscatch')) jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > jQuery('#tsBox').offset().top) jQuery('#tsBox').addClass("fixed");
			else jQuery('#tsBox').removeClass("fixed");
		});
	tsDetermine();
	jQuery(window).resize(function () {
		tsDetermine();
	});

}
function tsScrollLeft(a) {
	var scrollable = jQuery(a).parent().children('ul.slides');
	var jump = jQuery(window).width() <= 400 ? 1 : scrollable.parent().data('tssjump');
	var nextScroll = scrollable.scrollLeft()-scrollable.children('li').outerWidth()*jump;
	var multSlow = 1;
	if (scrollable.scrollLeft() <= 0) {
		nextScroll = scrollable.get(0).scrollWidth-scrollable.innerWidth();
		multSlow = 3;
	}
	scrollable.animate({scrollLeft: nextScroll}, scrollable.parent().data('tssspeed')*multSlow);
}
function tsScrollRight(a) {
	var scrollable = jQuery(a).parent().children('ul.slides');
	var jump = jQuery(window).width() <= 400 ? 1 : scrollable.parent().data('tssjump');
	var nextScroll = scrollable.scrollLeft()+scrollable.children('li').outerWidth()*jump;
	var multSlow = 1;
	if (scrollable.scrollLeft() >= scrollable.get(0).scrollWidth-scrollable.innerWidth()) {
		nextScroll = 0;
		multSlow = 3;
	}
	scrollable.animate({scrollLeft: nextScroll}, scrollable.parent().data('tssspeed')*multSlow);

}

function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());

  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');
	var timeinterval = null;

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
			clock.innerHTML = "";
    }
  }

  updateClock();
  timeinterval = setInterval(updateClock, 1000);
}

// function.js

function closeMe(x) {
	var a = jQuery(window).scrollTop();
	jQuery(x).parent().addClass('hide').delay(0).queue(function() {
		jQuery(window).scrollTop(a).dequeue();
	});
}

jQuery(document).ready(function($) {

	function fillImages(){
		jQuery("img.fill").each(function() {

			var parent = jQuery(this).parent();
			var pratio = parent.innerWidth()/parent.innerHeight();
			var mratio = jQuery(this).width()/jQuery(this).height();
			if (pratio > mratio){
				jQuery(this).css("width", "100%");
				jQuery(this).css("height", "auto");
			} else {
				jQuery(this).css("width", "auto");
				jQuery(this).css("height", "100%");
			}
		});
	}

	function setFooterHeight() {
		jQuery('#csctop').css('margin-bottom', jQuery('#cscbottom').outerHeight(true)+"px");
	}

	jQuery(window).load(function() {
		jQuery(".parallax").simpleParallax();
		cnInit();
		tsInit();

		fillImages();
		setFooterHeight();
		jQuery(document).foundation();
	});
	jQuery(window).resize(function(){
		fillImages();
		setFooterHeight();
		jQuery('.main-header').height(jQuery(window).height());
	});
});
