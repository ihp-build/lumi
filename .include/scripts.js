$(document).ready(function(){
	$(window).scroll(function(){
		$('.prlx_layer').each(function(){
			getPrlxTop($(this));
		});
	});

	var mainRevSlide = itBeSlider({
		display:$('#main_rev_slider_disp'),
		next:$('.main_rev_arr_r'),
		prev:$('.main_rev_arr_l'),
	})

	var mainSlide = itBeSimpleSlider({
		display:$('#slider'),
		period:5000,
	})

	$('.nav_opener').click(function(){
		$('.nav').addClass('showed');
		$('body').addClass('flowed');
	})

	$('.nav').click(function(){
		$(this).removeClass('showed');
		$('body').removeClass('flowed');
	})
});

function getPrlxTop(el){
		var itemperc = parseInt(el.attr('data-prc'));
		var begin = el.parent().offset().top - $(window).outerHeight(true);
		var full =  el.parent().outerHeight(true) +  $(window).outerHeight(true);
		var now = $(window).scrollTop() - begin;
		var nowprc = now/full;
		var next = nowprc*itemperc;
		if((nowprc > 0)&&(nowprc<1)){
			el.css('top',-next+'%');
		}
}

