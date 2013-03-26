var APP = (function(_h){
	this.menu 		= {};
	this.touch 		= {};
	this.utilities 	= {};
	this.controls 	= {};
	this.events		= {
		controls: {
			events: []
		}
	};

	this.utilities.isMobile = function()
	{
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
			APP.touch.init();
		}
	}
	this.menu.deploy = function()
	{
		$('#account-controls').hover(function(){
			$(this).find('li:first').addClass('active').next().slideDown(100);
		}, function(){
			$(this).find('li:first').removeClass('active').next().slideUp(100);
		});
	}

	this.touch.init  = function()
	{
		_h($('#start')[0]).on('swipeleft', function(){
			alert('swipeleft detected');
		});
		
		_h($('body')[0]).on('tap', function(){
			var $controls = $('#account-controls'), 
			$li 	  = $controls.find('li:first');
		
			if($li.hasClass('active')){
				$li.removeClass('active').next().slideUp(100);
			}
		});
	}
	this.events.controls.addEvent = function(evt, action)
	{
		var events = this.events.controls.events;
		events.push([evt, action]);
	}
	this.events.controls.init = function()
	{
		this.events.addPublisher('controls');
	}
	this.controls.toggleHomeControls = function(target, toFadeIn)
	{

	}

	return this;
})(Hammer);

$(document).ready(function($) {
	APP.utilities.isMobile();
	APP.menu.deploy();

	//see readme in js folder for notes on how this is supposed to function
	//APP.events.controls.addEvent('click', this.controls.toggleHomeControls);
	//APP.events.controls.init();
});