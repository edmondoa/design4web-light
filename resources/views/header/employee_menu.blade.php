<nav id="nav" role="navigation">
	<a href="#nav" title="Show navigation">Show navigation</a>
	<a href="#" title="Hide navigation">Hide navigation</a>
	<ul class="clearfix">
		<li><a href="/dashboard-employee" aria-haspopup="true"><span>Home</span></a>
		<ul>
				<li><a href="/employee/measure">Create Measure</a></li>
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

