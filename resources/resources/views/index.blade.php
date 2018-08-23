@extends('layout.frontmaster')

@section('content')
<!-- Page Heading -->
<h1 class="my-4" style="display: none;">Products
 <a href="" title="Add Product" class='pull-right btn btn-sm btn-add-product'><i class='fa fa-plus-circle fa-3x'></i></a>       
</h1>
<h1><br/><br/></h1>
<div class="row" ng-controller="productCtrl">
    <div class="row">          
    <div class="col-lg-3 col-sm-6 portfolio-item" ng-repeat="product in products">
        <div class="card h-50">
            <a href="/product"><img class="card-img-top img-fluid" src="/img/product/@{{product.avatar}}" alt=""></a>
            <div class="card-block">
                <h4 class="card-title"><a href="#" ng-bind="product.product_name"></a></h4>
                <p class="card-text" ng-bind='product.description'>
                    
                </p>
                <div class='row btn-grp-social' style="display:none;">
                    <div class='col-sm-5 pull-left'>
                       <a title="Del" class="btn btn-facebook" ng-click="fbShare(product.id)" href="https://www.facebook.com/sharer/sharer.php?u=http://addtool.design4web.dk/product/@{{product.id}}&display=popup"><i class="fa fa-facebook fa-fw"></i> Del </a>
                    </div>
                    <div class='col-sm-5 pull-left'>
                        <a href="/product/@{{product.id}}" title="Del" class="btn btn-primary "> Details</a>
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
@stop