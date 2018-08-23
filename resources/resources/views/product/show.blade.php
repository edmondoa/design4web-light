@extends('layout.master')

@section('content')
<!-- Page Heading -->
 <link href="/css/product.css" rel="stylesheet">
 <meta property="og:url"           content="http://addtool.design4web.dk/{{$product->id}}/product" />
  <meta property="og:type"          content="article" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="http://addtool.design4web.dk/img/product/{{$product->avatar}}" />
 <div class="row" style='margin-top:20px;margin-bottom:20px;'>
    <div class="col-md-12">
        <h1 class="my-4"></h1>
    </div>
    <div class="col-md-6 offset-md-3">
        <div class="col-item">
            <div class="photo">
                <img src="{{'/img/product/'.$product->avatar}}" class="img-responsive" alt="a" />
            </div>
            <div class="info">
                <div class="row">
                    <div class="price col-md-6">
                        <h5>
                            {{$product->product_name}}</h5>
                        <!-- <h5 class="price-text-color">
                            $199.99</h5> -->
                    </div>
                    <!-- <div class="rating hidden-sm col-md-6">
                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                        </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                        </i><i class="fa fa-star"></i>
                    </div> -->
                </div>
                <div class="separator clear-left">
                    <p>
                    {{$product->description}}
                    </p>
                    <!-- <p class="btn-add">
                        <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                    <p class="btn-details">
                        <i class="fa fa-list"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">More details</a></p> -->
                </div>
				
				
                <div class="clearfix">
                </div>
				
                    
                    
                
            </div>
        </div>
		<div class="social-buttons col-sm-5 pull-left">
	
			
			   <a class="btn btn-facebook fb-post " href="https://www.facebook.com/dialog/feed?
		  app_id=441207849567726
		  &display=popup&amp;caption=testpost&type=article 
		  &link=http://addtool.design4web.dk/{{$product->id}}/product">
			   <i class="fa fa-facebook fa-fw"></i> POST
			</a>
		</div>
		
    </div>
</div>    


<!-- /.row -->

<!-- Pagination -->
    
</div>
@stop
@section('og')
<meta property="og:url" content="http://addtool.design4web.dk{{'/product/'.$product->id}}" />
	<meta property="og:title" content="{{$product->product_name}}" />
	<meta property="og:image" content="http://addtool.design4web.dk{{'/img/product/'.$product->avatar}}" />
	<meta property="og:description" content="{{$product->description}}" />
	<meta property="og:type" content="website" />
@endsection
@section('html_footer')
@parent
<script src="/js/counter_system.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("ul.navbar-nav li").removeClass('active');
        $("ul.navbar-nav li.product").addClass('active');
    })
</script>
@stop




