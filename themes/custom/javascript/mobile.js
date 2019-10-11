;(function($) { 
	$(document).ready(function() {
		$(".lightwidget-widget").contents().find(".lightwidget__tile").attr('style', 'flex-basis: 100%; max-width: 100%; width: 100%;');
		$(".lightwidget-widget").contents().find(".lightwidget__image").attr('style', 'width: 100%;');

		$('.dropdown').click(function(event){
			if ($(this).find('.dropdown-content') && event.target.className  !== 'nav-link child') {
				event.preventDefault();
				$(this).find(".dropdown-content").slideToggle( "slow");
			}
		});

		$('.footer_content').click(function(event){
			$(this).find('p').toggle();
		});
	});
})(jQuery);