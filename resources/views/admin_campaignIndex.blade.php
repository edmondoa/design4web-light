
@include('admin.header')
@include('admin.menu')
<div class="block-wrap padz">
<h1>Campaign Lists</h1>

  @foreach($products as $products)
			<div id="userslists">
           
			<ul >
				
				<li>
					<div><strong>{{ $products->product_name }}</strong><em> - active</em></div>
					<div><img src="/public/img/product/{{ $products->avatar}}" width="100%" height="auto"></div>
					
					<div><p>{{ $products->description }}</p></div>
					<form action="/campaign/delete" method="post">
						<input name="id" type="hidden" value="{{ $products->id }}" />
						<input  type="submit" value="delete"/>
					</form>
				</li>			
				
			</ul>
          
				
			</div>

			  @endforeach
</div>

@include('admin.footer')