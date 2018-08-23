<h1>User Activity</h1>

  @foreach($users as $user)
			<div id="userslists">
           
			<ul >
				<li>{{ $user->name }} shares the product <a href="/products/{{ $user->prod_id}}" target="_self"> {{ $user->product_name }} </a> </li>
			</ul>
          
				
			</div>

			  @endforeach