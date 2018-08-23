<nav id="nav" role="navigation">
	<a href="#nav" title="Show navigation">Show navigation</a>
	<a href="#" title="Hide navigation">Hide navigation</a>
	<ul class="clearfix">
		<li><a href="/dashboard">Home</a></li>
		
		<li>
	<a href="#" aria-haspopup="true"><span>Graph</span></a>
	<ul>
		
		<li><a href="/graph/gen-emp">Custom Graph</a></li>
	</ul>
		</li>	
	
		<li>
			<a href="?work" aria-haspopup="true"><span>Company</span></a>
			<ul>
				<li><a href="/measure/create">Create Measure</a></li>
				<li><a href="/company/view-measure">View Measure</a></li>
				<li><a href="/employee/create">Create Employee</a></li>
				<li><a href="/employee/lists">Employee Lists</a></li>
			</ul>
		</li>
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

