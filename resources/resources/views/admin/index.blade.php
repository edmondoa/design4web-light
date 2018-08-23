@extends('layout.master')

@section('content')

<div class="col-md-12 m-t-5"> 

    <table id="admin" class="bsTable table table-striped"
             data-url="/admin/ads-list"
             data-pagination="true"
             data-side-pagination="server"
             data-page-list="[10,20,50]"
             data-sort-order="desc"
             data-show-clear="true"
             js-bootstraptable>
            <thead>
                <tr>
                    <th class="col-sm-3" data-field="ads" >Ads</th>
                    <th class="col-sm-2"data-field="share" >No. share</th>
                    <th class="col-sm-7"  data-field="link" >Link</th>
                    
                </tr>
            </thead>
            </table>
          </div>    
</div> 

@stop
@section('html_footer')
@parent

<script src="/js/counter_system.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("ul.navbar-nav li").removeClass('active');
        $("ul.navbar-nav li.admin").addClass('active');
        $(".bsTable").bootstrapTable();
    })
</script>
@stop