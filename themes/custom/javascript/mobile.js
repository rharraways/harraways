;(function($) { 
	$(".lightwidget__tile").attr('flex-basis', '100%');
	$(".lightwidget__tile").attr('max-width', '100%');
	$(".lightwidget__tile").attr('width', '100%');

	$(".lightwidget__image").attr('width', '100%');

	$('.dropdown').click(function(event){
		console.log(event.target.className );
		if ($(this).find('.dropdown-content') && event.target.className  !== 'nav-link child') {
			event.preventDefault();
			$(this).find(".dropdown-content").slideToggle( "slow");
			console.log(event.target.className );
		}
	});
})(jQuery);