
function setGoTop(){
	$(document).ready(function(){
		$('body').append('<div id="gotop" class="fa fa-angle-up"></div>');
		$('#gotop').click(function(){
			$('html, body').animate( { scrollTop: 0 }, 500 );
		});
		$(window).scroll(function(){
			if($(window).scrollTop() > 100){
				$('#gotop').addClass('visible',100);
			}else{
				$('#gotop').removeClass('visible',100);
			}
		});
	});
}

function setMenuFix(_parameters){

	var menuObj = _parameters.menuObj;
	var menuH = _parameters.menuH?_parameters.menuH:menuObj.outerHeight(true);


	var startTop = menuObj.offset().top;

	$(window).scroll(function() {

		if($(window).scrollTop() > ( menuH- startTop)){
			menuObj.css('top', $(window).scrollTop() - startTop);
		}else{
			menuObj.css('top', '');
		}
	});

	$(window).resize(function(){
		menuH = _parameters.menuH?_parameters.menuH:menuObj.outerHeight(true);
	});

}

$(document).ready(function(){
	$('.fancybox').fancybox({
		helpers:{
			overlay:{
				locked: true
			}
		}
	});

	$('.zoom').fancybox({
		helpers:{
			overlay:{
				locked: true
			}
		}
	});

	$('.scrolled').click(function(){
		destination = $($(this).attr("href")).offset().top;
		$('html, body').animate( { scrollTop: destination }, 500 );
		return false;
	});
//////////////////////////////////////NEED SET STYLE
	$('label').click(function(){
		$('label').removeClass('selected');
		$("label > input:checkbox:checked").parent().addClass('selected');
		$("label > input:radio:checked").parent().addClass('selected');
	});

});

function validate(validform){
	//use required, required_mail, required_phone
	var returned = true;
	validform.find('.required').each(function(){
		var pattern = /[a-zA-Z0-9а-яА-ЯёЁ]+/i;
		if(!pattern.test($(this).val())){
			$(this).css('borderColor','#aa0000');
			returned = false;
		}else{$(this).css('borderColor','');}
	});

	validform.find('.required_mail').each(function(){
		var pattern = /^[a-zA-Z0-9а-яА-ЯёЁ\._-]+@[a-zA-Z0-9а-яА-ЯёЁ_-]+\.[a-zA-Z0-9а-яА-ЯёЁ]+$/i;
		if(!pattern.test($(this).val())){
			$(this).css('borderColor','#aa0000');
			returned = false;
		}else{$(this).css('borderColor','');}
	});

	validform.find('.required_phone').each(function(){
		var freestr = $(this).val().replace(/[\s\(\)\.\+-]/ig,'');
		var pattern = /^[0-9]{5,}$/g;
		if(!pattern.test(freestr)){
			$(this).css('borderColor','#aa0000');
			returned = false;
		}else{$(this).css('borderColor','');}
	});

	return returned;
}

function ajaxFormTry(ajaxForm){
	if(validate(ajaxForm)){
		$.post(
			ajaxForm.attr('action'),
			ajaxForm.serialize(),
			function(data){
				$.fancybox.open(data);
			})
	}
	return false;
}