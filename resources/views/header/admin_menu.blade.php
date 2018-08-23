<nav id="nav" role="navigation">
	<a href="#nav" title="Show navigation">Show navigation</a>
	<a href="#" title="Hide navigation">Hide navigation</a>
	<ul class="clearfix">
		<li><a href="/dashboard">Home</a></li>
	
		
		<li>
			<a href="#" aria-haspopup="true"><span>Admin</span></a>
			<ul>
				<li><a href="/company/create">Create Company</a></li>
				<li><a href="/company/lists">Company lists</a></li>
			
				
			</ul>
		</li>
		<li><a href="/admin/graph">Graph</a></li>
		<li><a href="/logout">Logout</a></li>
	
	</ul>
</nav>

	
	
<script src="/public/menu/js/jquery.min.js"></script>
<script src="/public/menu/js/doubletaptogo.js"></script>
<script>
	$( function()
	{
		$( '#nav li:has(ul)' ).doubleTapToGo();
	});
</script>

