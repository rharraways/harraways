jQuery.noConflict();

(function($) {
	$(document).ready(function() {
		
		//responsive menu
		$('li.menu-parent a span').click(function(event) {
			event.preventDefault();
			if ($(window).width() < 640) {
				if (!$(this).parent().parent().hasClass('open')) {//open
					//close others
					$('li.menu-parent').removeClass('open');
					$('li.menu-parent a span').html(']');
					
					$(this).parent().parent().removeClass('open');
					$(this).parent().parent().addClass('open');
					$(this).html('[');
				}else {//close
					$(this).parent().parent().removeClass('open');
					$(this).html(']');
				}
			}
		});
		
		//responsive tables
		$('table').each(function(){
			$(this).css({"maxWidth": $(this).width()});
			$(this).width('100%');
			$(this).css({"minHeight": $(this).height()});
			$(this).height('auto');
		});
	});
	
	$(window).load(function() {
		
	});
}(jQuery));
