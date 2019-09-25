;(function($) { 
	$('.dropdown').click(function(event){
		$(this).find(".dropdown-content").toggle( "slow", function() {
    // Animation complete.
  });
	});
})(jQuery);