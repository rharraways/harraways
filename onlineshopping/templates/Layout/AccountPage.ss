<div class="account-page sws">
	

	$Content
	
	<% if Orders %>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th><% _t('AccountPage.DATE','Date') %></th>
					<th><% _t('AccountPage.TOTAL','Total') %></th>
					<th><% _t('AccountPage.STATUS','Status') %></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<% loop Orders %>
				<tr>
					<td>$ID</td>
					<td>$OrderedOn.Format(j M y)</td>
					<td>$TotalPrice.Nice</td>
					<td>$Status ($PaymentStatus)</td>
					<td><a href="$Link"><% _t('AccountPage.VIEW_THIS_ORDER','View this order') %></a></td>
				</tr>
				<% end_loop %>
			</tbody>
		</table>
	<% else %> 
		
		<div class="container">
        <div class="row  text-uppercase text-center justify-content-center py-12 cbl">
		
		
			<a href="$BaseHref/b2b-2/domestic-sales">Click here to download files</a> 
		</div>

		</div>
	<% end_if %>


</div>