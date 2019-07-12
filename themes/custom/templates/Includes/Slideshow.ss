<div class="slideshow-wrapper">
	<div class="cycle-slideshow"
		data-cycle-swipe="true"
		>  
		<div class="cycle-pager"></div>
		<% loop $slides %>
			<img src="$Image.Link" data-caption="#$Image.ID"  />
		<% end_loop %>
	</div>
</div>