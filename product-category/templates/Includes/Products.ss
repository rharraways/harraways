<% if Products %>

	<% include Pagination %>

	<div class="product-row">
		<% loop Products %>
			<div class="product-brief">
				
				<h5 class="product-brief-title">
					<a href="$Link">$Title.XML</a>
				</h5>
				
				<p class="product-brief-price">
					$Price.Nice
				</p>
				
			</div>
	
			<% if Last %>
			</div>
			<% else %>
				<% if MultipleOf(4) %>
					</div><div class="product-row">
				<% end_if %>
			<% end_if %>
			
		<% end_loop %>
	
	
	<% include Pagination %>

<% else %>

	<div class="alert alert-info">
		<% _t('Products.NONE_TO_DISPLAY','Sorry, there are no products to display in this category. We will be adding more products shortly, come back soon!') %>
	</div>

<% end_if %>