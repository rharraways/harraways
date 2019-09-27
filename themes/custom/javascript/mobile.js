;(function($) { 
	$('.dropdown').click(function(event){
		if ($(this).find('.dropdown-content') && event.target.nodeName !== 'a') {
			event.preventDefault();
			$(this).find(".dropdown-content").slideToggle( "slow");
			Console.log(event.target.nodeName);
		}
	});
})(jQuery);