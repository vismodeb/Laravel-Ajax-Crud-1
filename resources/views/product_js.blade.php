
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$.ajaxSetup({
headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
    $(document).ready(function(){
        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            // console.log(name+price);

            $.ajax({
                url:"{{ route('add.product') }}",
                method:'post',
                data:{name:name,price:price},
                success:function(res){
                    if(res.status=='success'){
                        $('#exampleModal').modal('hide');
                        $('#addproductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errorMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            })
        })

        // show product value in update form
        $(document).on('click','.update_product_form',function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        // update product data
        $(document).on('click','.update_product',function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();

            $.ajax({
                url:"{{ route('update.product') }}",
                method:'post',
                data:{up_id:up_id,up_name:up_name,up_price:up_price},
                success:function(res){
                    if(res.status=='success'){
                        $('#updateModal').modal('hide');
                        $('#updateproductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index, value){
                        $('.errorMessage').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            })
        })
    })
</script>
