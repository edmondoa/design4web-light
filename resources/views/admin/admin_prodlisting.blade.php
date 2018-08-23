@include('admin.header')
@include('admin.menu')   
			
<div class="block-wrap padz">
             <ul class="context" style="clear:both;">
        @foreach($products as $products)
                        <li>
						<img src="/public/img/product/{{ $products->avatar }}" width="250" height="auto">
                        <h2>{{$products->product_name}}</h2>
                        <p>{{$products->description}}</p>
						<p>{{$products->shares}}</p>
                       
				 
						<form action="/admin/products/delete" method="post">
						<input name="id" type="hidden" value="{{ $products->id }}" />
						<input  type="submit" value="delete"/>
					</form>
			 </li>	 
		@endforeach
            

              </ul>

</div>

@include('admin.footer')