<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){
     //   console.log(window);

        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            let name = $('#name').val(); //val() taking value The val() method returns or sets the value attribute of the selected elements.
            let price = $('#price').val();
           // console.log(name+price);
           $.ajax({
               url:"{{route('add.product')}}",
               method:'post',
               data: {name:name , price:price }, // here is the name index : then let variable name
                success: function(res){
                    //console.log(res.status);
                    if(res.status=='success'){
                        
                        $('.close_product').click();
                       $('#addProductForm')[0].reset(); // product form value removed inside from the input
                       $('.table').load(location.href+' .table')//.table is loading the location of URL and adding the table // instantly data save no loading and data showing instantly
                        
                    }

                },error:function(err){
                    //console.log(err);
                    let error = err.responseJSON;
                    
                    // this is validate function
                    $.each(error.errors,function(index,value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            })
        })

        //show product value in update form
        $(document).on('click','.update_product_form',function(){
            let id = $(this).data('id'); // this = button tag from .update_product_form
            let name = $(this).data('name'); // collecting data
            let price = $(this).data('price'); /*
            data-id="{{$product->id}}"
                            data-name="{{$product->name}}"
                            data-price="{{$product->price}}"  
            */
            $('#up_id').val(id);
            $('#up_name').val(name);  // val is used to put value in the tagname
            $('#up_price').val(price);
        });

            //Update product data


            
        $(document).on('click','.update_product',function(e){
            e.preventDefault();
            let up_id = $('#up_id').val(); // up_id taking from update_product_modal id
            let up_name = $('#up_name').val(); //val() taking value The val() method returns or sets the value attribute of the selected elements.
            let up_price = $('#up_price').val(); // val is catching value
           // console.log(name+price);
           $.ajax({
               url:"{{route('update.product')}}",
               method:'post',
               data: { up_id:up_id, up_name:up_name , up_price:up_price }, // here is the name index : then let variable name
                success: function(res){
                    console.log(res.status);
                    if(res.status=='success'){
                        
                        $('.close_product').click();
                       $('#updateProductForm')[0].reset(); // product form value removed inside from the input
                       $('.table').load(location.href+' .table')//.table is loading the location of URL and adding the table // instantly data save no loading and data showing instantly
                        
                    }

                },error:function(err){
                    //console.log(err);
                    let error = err.responseJSON;  // this is validate function
                    $.each(error.errors,function(index,value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            })
        })



    });


   
</script>