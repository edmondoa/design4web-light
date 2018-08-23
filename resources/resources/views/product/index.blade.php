@extends('layout.master')


@section('content')
<!-- Page Heading -->
<h1 class="my-4">Products
 <a href="" title="Add Product" class='pull-right btn btn-sm btn-add-product'><i class='fa fa-plus-circle fa-3x'></i></a>       
</h1>

<div class="row" ng-controller="productCtrl">
    <div class="row">          
    <div class="col-lg-3 col-sm-6 portfolio-item" ng-repeat="product in products">
        <div class="card h-50">
            <a href="#"><img class="card-img-top img-fluid" src="/img/product/@{{product.avatar}}" alt=""></a>
            <div class="card-block">
                <h4 class="card-title"><a href="#" ng-bind="product.product_name"></a></h4>
                <p class="card-text" ng-bind='product.description'>
                    
                </p>
                <div class='row btn-grp-social'>
                   
					<div class="social-buttons col-sm-5 pull-left">
								<input type="button" value="Share on Facebook" onclick="btnClick({{product.id}})">
					</div>	

					<div class='col-sm-5 pull-left'>
						  <a href="/product/@{{product.id}}" title="Del" class="btn btn-primary "> Detailss</a>

					</div>
					
                </div>          
            </div>
            
            
        </div>
    </div>
    <pagination 
      ng-model="currentPage"
      total-items="products.length"
      max-size="maxSize"  
      boundary-links="true">
    </pagination>
    </div> 

<!-- /.row -->

<!-- Pagination -->
    
</div>
@stop
@section('html_footer')
@parent
<script src="/js/counter_system.js"></script>
<script src="/angular/controllers/product.js"></script>
<script src="/angular/dirPagination.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("ul.navbar-nav li").removeClass('active');
        $("ul.navbar-nav li.product").addClass('active');
    })
</script>

<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
		appId   : '441207849567726',
		xfbml   : true,
		version : 'v2.10',
		status  : true,
		cookie  : true,
		oauth   : true
	});
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function post_ads(f_id,pass_count){

	$.post( "http://shareit.design4web.dk/public/util/db_update.php", { fb_id:f_id, fb_counter: pass_count })
	
  .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
}
		
function fbLogout() {
    FB.logout(function() {  
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}
	
function btnClick(idd) {
	FB.login(function (response) {
		if (response.authResponse) {
			var body = 'Reading JS SDK documentation';

			FB.api('/me/friends', function(response) {
				if (!response || response.error) {
					var read_err_text = 'Error';
					$("#read_result").text(read_err_text);
				} else {
					var read_ok_text = response.summary.total_count;
					$("#read_result").text(read_ok_text);
					
					share_this(idd,read_ok_text);
					
					
				 	
					
					
				}
			});

		} else {
			alert('User is logged out');
		}
	}, {scope: 'public_profile,user_friends'});
};



function share_this(f_id,total_) {

$.ajaxSetup({ cache: true });
        $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
        FB.init({
          appId: '441207849567726', //replace with your app ID
          version: 'v2.10'
        });
        FB.ui({
            method: 'share',
            title: '{{$product->product_name}}',
            description: '{{$product->description}} ',
            href: 'http://shareit.design4web.dk/product/'+f_id,
          },
          function(response) {
            if (response && !response.error_code) {
            	
				post_ads(f_id,total_);
				
				
				
            } else {
              alert('Error while posting.');
            }
        });
  });
}


</script>



@stop