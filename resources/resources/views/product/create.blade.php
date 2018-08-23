<form action="/product" method="post" enctype="multipart/form-data" id='frm-add'>
<div class='col-12'>
  <div class="form-group row">
    <label for="example-text-input" class="col-3 col-form-label"></label>
    <div class="col-9">
      <img class="card-img-top img-fluid img-preview" src="http://placehold.it/700x400" alt="">
      <input type='file' name='product' id="product-file" style="display:none" />  
    </div>
  </div>
  <div class="form-group row">
    <label for="example-search-input" class="col-3 col-form-label">Name</label>
    <div class="col-9">
      <input class="form-control" type="text" value="" name="product_name">
    </div>
  </div>  
  <div class="form-group row">
    <label for="example-color-input" class="col-3 col-form-label">Description</label>
    <div class="col-9">
      <textarea name='description' class='' id='description'>        
      </textarea>
    </div>
  </div>
</div>
</form>
