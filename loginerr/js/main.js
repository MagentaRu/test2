/* ################################## */
/* ##### Language switch ##### */
/* ################################## */
jQuery(document).ready(function en() {
	$('.en').on('click', function() {
		$('.rus').fadeOut(0);
		$('.eng').fadeIn(0);
	})
	$('.ru').on('click', function ru() {
		$('.eng').fadeOut(0);
		$('.rus').fadeIn(0);
	})
});
	
jQuery(document).ready(function () {
	function ru(){
		alert('hahahahaha!');
	}
});

jQuery(document).ready(function($) {

	shortly = new Date();
	shortly.setSeconds(shortly.getSeconds() + 10.5);
	$('#shortly').countdown('option', {
		until: shortly,
		format: 's'
	});

	$('#shortly').countdown({
		until: shortly,
		compact: true,
		onExpiry: liftOff,
		onTick: watchCountdown,
		format: 's'
	});

	function liftOff() {
	history.back(); /* history back page */
	/*	alert('redirect to maxoptra login'); /* end function */
	}

	function watchCountdown(periods) {
		$('#monitor').text(' ');
	}
});

/* определение языка браузера; англ - default, если русский - переключаем клнтент на русский */ 

var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage).substr(0, 2).toLowerCase();
function langyou () {
	if (lang != 'en') {
		$('.eng').fadeOut(0);
		$('.rus').fadeIn(0);
	}
}
	
