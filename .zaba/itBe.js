itBeSlider = function(_parameters){
	this.aDisplay = _parameters.display;
	this.getNextWidth = function(){
		return this.aDisplay.children().eq(0).outerWidth(true)/this.aDisplay.outerWidth(true)*(10000);
	}
	this.isWork = function(){
		if( Math.round(100/this.getNextWidth()) < this.aDisplay.children().length ){
			return true;
		}else{
			return false;
		}
	}
	this.leftSlide = function(){
		if((this.aDisplay.queue().length == 0) && this.isWork()){
			this.aDisplay.prepend(this.aDisplay.children().last());
			this.aDisplay.css('left',-this.getNextWidth()+'%');
			this.aDisplay.animate({'left': '0' },300);
		}
	}
	this.rightSlide = function(){
		if((this.aDisplay.queue().length == 0) && this.isWork()){
			this.aDisplay.animate(
				{'left': -this.getNextWidth() + '%'},
				300,
				function () {
					$(this).css('left', '');
					$(this).append($(this).children().eq(0));
				});
		}
	}
	this.aDisplay.draggable({
		axis: "x",
		drag: function( event, ui ){
			myChildWdth = $(this).children().eq(0).outerWidth(true);
			myMargL = parseInt($(this).css('marginLeft'));
			myMargR = parseInt($(this).css('marginRight'));
			myLeft = parseInt($(this).css('left'));
			if((myLeft + myMargL) < -myChildWdth){
				$(this).css('marginLeft', -myLeft + 'px');
				$(this).append($(this).children().eq(0));
			}
			if((myLeft + myMargL) > 0 ){
				$(this).css('marginLeft', -myLeft -myChildWdth + 'px');
				$(this).prepend($(this).children().last());
			}
		},
		stop: function( event, ui ){
			myChildWdth = $(this).children().eq(0).outerWidth(true);
			myLeft = parseInt($(this).css('left'));
			marginLeft = parseInt($(this).css('marginLeft'));
			$(this).css('marginLeft', '');
			$(this).css('left', (myLeft + marginLeft)+'px');
			if((myChildWdth/2) > -(myLeft + marginLeft)){
				$(this).animate({'left': 0},200);
			}else{
				$(this).animate(
					{'left': -myChildWdth},
					200,
					function(){
						$(this).css('left', '');
						$(this).append($(this).children().eq(0));
					}
				);
			}
		},
		start: function( event, ui ) {
			$(this).stop();
			if(Math.round(100/($(this).children().eq(0).outerWidth(true)/$(this).outerWidth(true)*10000)) >= $(this).children().length){
				return false;
			}
		}
	});

	if(_parameters.next && _parameters.prev){
		_parameters.next.disableSelection();
		_parameters.prev.disableSelection();
		_parameters.next.bind('click', {sliderObj:this}, function(eventObject){
			eventObject.data.sliderObj.rightSlide();
		});
		_parameters.prev.bind('click', {sliderObj: this}, function (eventObject) {
			eventObject.data.sliderObj.leftSlide();
		});
		this.controlIsVisible = function () {
			if (!this.isWork()) {
				_parameters.next.hide();
				_parameters.prev.hide();
			} else {
				_parameters.next.show();
				_parameters.prev.show();
			}
		}
		this.controlIsVisible();
		$(window).bind('resize', {sliderObj:this}, function(eventObject){
			eventObject.data.sliderObj.controlIsVisible();
		});
	}
	return this;
};

itBeSimpleSlider = function(_parameters){
	this.display = _parameters.display;
	this.period = _parameters.period?_parameters.period:3000;
	this.speed = _parameters.speed?_parameters.speed:500;
	this.hideClass = _parameters.hideClass?_parameters.hideClass:'hidden';

	this.next = function(){
		if(this.display.children().length <= 1){return false;}
		this.display.append(this.display.children().eq(0));
		this.display.children().last().addClass(hideClass);
		this.display.children().last().removeClass(hideClass,this.speed);
	}
	setInterval(this.next,this.period);
	return this;
}

/*itBeTimer = function(_parameters){
	this.toTime = new Date(_parameters.toTime).getTime();
	this.toDay = _parameters.toDay;
	this.toHour = _parameters.toHour;
	this.toMinute = _parameters.toMinute;
	this.toSecond = _parameters.toSecond;
	this.toBe = function(){
		var absTime = new Date;
		absTime = parseInt(absTime.getTime());
		var lastTime = Math.floor((this.toTime - absTime)/1000);
		if(this.toDay.length > 0){this.toDay.text(Math.floor(lastTime/(60*60*24)));}
		if(this.toHour.length > 0){this.toHour.text(Math.floor(lastTime/(60*60))%24);}
		if(this.toMinute.length > 0){this.toMinute.text(Math.floor(lastTime/60)%60);}
		if(this.toSecond.length > 0){this.toSecond.text(lastTime%60);}
	}
	this.toBe();
	this.toInterval = setInterval(function(){this.toBe();}, 1000);
}*/

itBeTimer = function(param){
	this.toTime = new Date(param.toTime).getTime();

	this.toDay = param.toDay;
	this.toHour = param.toHour;
	this.toMinute = param.toMinute;
	this.toSecond = param.toSecond;

	var absTime = new Date;
	absTime = parseInt(absTime.getTime());
	if(this.toTime > absTime){
		$.fancybox.open(param.wnd);
	}

	this.toBe = function(){
		var absTime = new Date;
		absTime = parseInt(absTime.getTime());

		var lastTime = Math.floor((this.toTime - absTime)/1000);

		if(this.toDay.length > 0){this.toDay.text(Math.floor(lastTime/(60*60*24)));}
		if(this.toHour.length > 0){this.toHour.text(Math.floor(lastTime/(60*60))%24);}
		if(this.toMinute.length > 0){this.toMinute.text(Math.floor(lastTime/60)%60);}
		if(this.toSecond.length > 0){this.toSecond.text(lastTime%60);}
	}

	this.toBe();
	this.toInterval = setInterval(function(){this.toBe();}, 1000);

}

itBeZoom = function(_parameters){
	if(!_parameters.object) return;
	_parameters.object.hover(function(){
		$(this).append('<img class="zoooom" src="'+$(this).attr('href')+'">');
		$(this).append('<div class="zoooomhover"></div>');
	},function(){
		$(this).children('.zoooom').remove();
		$(this).children('.zoooomhover').remove();
	}).mousemove(function(e){
		mousePercentX = ($(this).children('.zoooom').outerWidth() - $(this).outerWidth())*(e.offsetX/$(this).outerWidth());
		mousePercentY = ($(this).children('.zoooom').outerHeight() - $(this).outerHeight())*(e.offsetY/$(this).outerHeight());
		$(this).children('.zoooom').css('marginLeft',-mousePercentX+'px').css('marginTop',-mousePercentY+'px');
	})
};