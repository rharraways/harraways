;(function($) { 
	$('.dropdown').click(function(event){
		$(this).find(".dropdown-content").animate({height: 'auto'}, 0);
	});
})(jQuery);