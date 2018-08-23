@include('admin.header')
@include('admin.menu')

<div class="block-wrap padz">
<h1>User Activity</h1>

  @foreach($users as $user)
			<div id="userslists">
           
			<ul >
				<li>{{ $user->name }} shares the product <a href="/products/{{ $user->url_alias}}" target="_blank"> {{ $user->product_name }} </a> </li>
			</ul>
          
				
			</div>

			  @endforeach
</div>
@include('admin.footer')
