;(function($) { 
	$('.dropdown').click(
		function(){
			(this).find(".dropdown-content").animate({height: 0}, 0);
		},
		function() {
		    (this).find(".dropdown-content").animate({height: 'auto'}, 0);
  		}
	);
})(jQuery);