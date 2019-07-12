<ul id="nav" class="navbar-nav mr-auto text-uppercase fz14 fw6 ml-2 ">

	<% loop $Menu(1) %>


	<% if children %>

		<ul class="nav-link dropdown">
			<li class="parent">
				<a  class="dropbtn dropdown-toggle root" href="#" title="$Title.XML">
					$MenuTitle.XML
				</a>
			</li>

			<li class="parent dropdown-content">
				<% loop children %>
				<a class="nav-link child" href="$Link" title="$Title.XML" >
					$MenuTitle.XML
				</a>
				<% end_loop %>
			</li>

	</ul>
	<% else_if $URLSegment =="products"  %>
		<ul class="nav-link dropdown">
			<li class="parent">
				<a  class="dropbtn dropdown-toggle root" href="#"  title="$Title.XML">
					$MenuTitle.XML
				</a>
			</li>
				<li class="parent dropdown-content product">
					<% loop $ListPageByType('ProductCategory') %>
					<a class="nav-link child" href="$Link#products"  title="$Title.XML" >
						$MenuTitle.XML
					</a>
					<% end_loop %>
				</li>
		</ul>
	<% else %>

	<li class="parent">
		<a class="nav-link root" href="$Link" title="$Title.XML">
			$MenuTitle.XML
		</a>
	</li>

	<% end_if %>
	<% end_loop %>

</ul>