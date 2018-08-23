$(document).on('click','.btn-add-product',function(e){
  e.preventDefault();
  $.get("/product/create", function(result){
      var dialog = bootbox.dialog({
          title: 'New Product',
          message: result,
          buttons: {
            confirm: {
                label: 'Add',
                className: 'btn-success',
                callback:function(){
                    
                    var file_data = $('#product-file').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('product', file_data);
                    form_data.append('product_name', $("input[name='product_name']").val());
                    form_data.append('description', $("#description").val());
                    console.log(form_data);                             
                    $.ajax({
                      url: '/product', // point to server-side PHP script 
                      dataType: 'json',  // what to expect back from the PHP script, if anything
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,                         
                      type: 'post',
                      success: function(response){
                          message(response)
                      }
                     });
                }
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
      });

    });
  
})

$(document).on("click",'.img-preview',function(){
    $("#product-file").trigger("click");
});

$(document).on("change","#product-file",function(){
  console.log(this);
  readURL(this);
});

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      console.log(input);
      reader.onload = function (e) {
          $('.img-preview').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
  }
}


function message(data)
{
  if(data.status){
    $.notify({
      message: data.message
    },{
      type: 'success',
      newest_on_top: true,
        placement: {
            align: "right",
            from: "bottom"
        }
    });
  }else{
    var stringBuilder ="<ul class='error'>";
    for (var x in data.message) {
      console.log(x);
      stringBuilder +="<li>"+data.message[x]+"</li>";
    }
    stringBuilder +="</ul>";
     $.notify({
        message: stringBuilder
      },{
        type: 'danger',
        newest_on_top: true,
        placement: {
            align: "right",
            from: "bottom"
        }
      });
  }
}


