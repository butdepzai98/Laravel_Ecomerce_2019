$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

            //*** */ Category
    //Add
    $('.add').on("click", function () {
        let name = $('.add_name').val();
        let stt = $('.add_status').val();

        $.ajax({
            type: "POST",
            url: "admin/category",
            data: {
                name: name,
                status: stt
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });

    //Edit
    $('.edit').click(function (e) { 
        let id = $(this).data('id');
        
        $.ajax({
            type: "get",
            url: 'admin/category/'+id+'/edit',
            dataType: "json",
            success: function ($result) {
                console.log($result);
                $('.name').val($result.name);
                $('.txtTitle').text($result.name);
                if($result.status == 1){
                    $('.hien').attr('selected','selected');
                }
                else{
                    $('.an').attr('selected','selected');
                }
                    
            }
        });

        $('.update').click(function () { 
            let ten = $('.name').val();
            let status = $('.status').val();
            $.ajax({
                 url: 'admin/category/'+id,
                 data: {
                     name: ten,
                     status: status,
                     id : id,
                 },
                 type : 'put', 
				 dataType : 'json',
                 success: function ($result) {
                     console.log($result);
                     if($result.errors === 'true')
                     {
                         $('.errors').text($result.message.name[0]);
                     }
                     else
                     {
                        $('#edit').modal('hide');
                        location.reload();
                        toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                     }
                    
                 }
             });
        });
        
        $('.cancel').click(function () { 
            location.reload();
        });
    });   
    
    //Delete Category
    $('.delete').click(function (e) { 
        let id = $(this).data('id');
        
        $('.del').click(function () { 

            $.ajax({
                type: "DELETE",
                url: 'admin/category/'+id,
                dataType: "json",
                success: function ($result) {
                    
                    $('#delete').modal('hide');
                    location.reload();
                    toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                }
            });
        });

        $('.not-del').click(function (e) { 
            location.reload();
        });
        
    });

    //-----------------------------------------

            //*** */ Product Type
    
    //Edit
    $('.editProductType').click(function (e) { 
        let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: 'admin/producttype/'+id+'/edit',
                dataType: "json",
                success: function ($result) {
                    console.log($result);
                    $('.nameProductType').val($result.proctype.name);
                    $('.titleProductType').text($result.proctype.name);

                    // //Lấy ra danh mục
                    var html ='';
                    $.each($result.category, function ($key, $value) { 
                         if($value['id'] == $result.proctype.cate_id){
                            html +='<option value='+$value['id']+' selected >'+$value['name']+'</option>';
                         }
                         else
                         {
                            html +='<option value='+$value['id']+' >'+$value['name']+'</option>';
                         }
                    });
                    $('.cate_idProductType').html(html);

                    if($result.proctype.status == 1)
                    {
                        $('.hienProductType').attr('selected','selected');
                    }
                    else{
                        $('.anProductType').attr('selected','selected');
                    }
                }
            });

            $('.updateProductType').click(function (e) { 
               let name = $('.nameProductType').val();
               let cate = $('.cate_idProductType').val();
               let status = $('.statusProductType').val();
                $.ajax({
                    type: "PUT",
                    url: 'admin/producttype/'+id,
                    data: {
                        name: name,
                        cate_id : cate,
                        status : status

                    },
                    dataType: "json",
                    success: function ($result) {
                        $('#edit').modal('hide');
                        location.reload();
                        toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                    }
                });
            });
        
           $('.cancelProductType').click(function (e) { 
               location.reload();
               
           }); 
    });

    //Delete ProductType
    $('.deleteProductType').click(function (e) { 
        let id = $(this).data('id');

        $('.delProductType').click(function () { 
            $.ajax({
                type: "DELETE",
                url: "admin/producttype/"+id,
                dataType: "json",
                success: function (response) {
                    $('#delete').modal('hide');
                    location.reload();
                    toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                }
            });
            
        });

        $('.not-delProductType').click(function (e) { 
            location.reload();
        });
            
    });

    //-----------------------------------------
            //** */ Ajax Controller để lấy Product Type dựa vào Category
    $('.addCate').on("change", function () {
        let id = $(this).val();

        $.ajax({
            type: "get",
            url: "getProductType",
            data: {
                cate_id : id
            },
            dataType: "json",
            success: function ($result) {
                console.log($result);
                html ='';
                $.each($result, function ($key, $value) { 
                     html+='<option value='+$value['id']+'>'+$value['name']+'</option>';
                });
                $('.showPTbyCate').html(html);
            }
        });
    });
    //-----------------------------------------
            //** */ Product
    //Delete
    $('.deleteProduct').on("click", function () {
        let id = $(this).data('id');

        $('.delProduct').on("click", function () {
            $.ajax({
                type: "delete",
                url: "admin/product/"+id,
                data: {
                    id : id
                },
                dataType: "json",
                success: function (response) {
                    $('#delete').modal('hide');
                    location.reload();
                    toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                }
            });
        });
            
    });

    //Edit
    $('.editProduct').on("click", function () {
        let id = $(this).data('id');
            
        $.ajax({
            type: "get",
            url: 'admin/product/'+id+'/edit',
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('.nameProduct').val(response.product.name);
                $('.quantityProduct').val(response.product.quantity);
                $('.imgProduct').attr('src','upload/img/product'+'/'+response.product.image);
                $('.priceProduct').val(response.product.price);
                $('.promoProduct').val(response.product.promotion);
        
        //Lấy Category
                htmlcate='';
                $.each(response.cate, function ($key, $value) { 
                    if($value["id"] == response.product.cate_id)
                     htmlcate+='<option value='+$value["id"]+' selected >'+$value["name"]+'</option>';

                    else
                        htmlcate+='<option value='+$value["id"]+' >'+$value["name"]+'</option>';
                });
                $('.cateProduct').html(htmlcate);

        //Lấy loại SP
                htmlprt='';
                $.each(response.productType, function ($key, $value) { 
                    if($value["id"] == response.product.productType_id)
                        htmlprt+='<option value='+$value["id"]+' selected >'+$value["name"]+'</option>'
                    else
                        htmlprt+='<option value='+$value["id"]+' >'+$value["name"]+'</option>'
                });        
                $('.showPTbyCateProduct').html(htmlprt);
        
        //Status
                if(response.product.status == 1)
                {
                    $('.hienProduct').attr('selected','selected');
                }
                else{
                    $('.anProduct').attr('selected','selected');
                }

//Hiện ra CKEditor 5
                // $('#product_edit').val(response.product.description);
                // var mota = [edit_product(), response.product.description];
                // Promise.all(mota).then(function(results) {
                //     results[0].setData(results[1]);
                // });
//End Hiện ra CKEditor 5
            }
        });
        //Lấy Loại sản phẩm theo Category AjaxController
        $('.cateProduct').on("change", function () {
            let id = $('.cateProduct').val();
                $.ajax({
                    type: "get",
                    url: "getProductType",
                    data: {
                        cate_id : id,
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        html='';
                        $.each(response, function ($key, $value) { 
                             html+='<option value='+$value["id"]+'>'+$value["name"]+'</option>';
                        });
                        $('.showPTbyCateProduct').html(html);
                    }
                });
        });

        //Update
        $('.FrmUpdateProduct').on("submit", function () {
            //Vì method PUT ko cho gửi ảnh sang nên phải tạo Route mới
            //Chặn Form submit
            event.preventDefault();
                $.ajax({
                    type: "post",
                    url: 'admin/updateProduct/'+id,
                    data: new FormData(this),
                    contentType : false,
                    processData : false,
                    cache: false,

                    success: function (response) {
                        //console.log(response);
                        $('#edit').modal('hide');
                        toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                        location.reload();
                    }
                });
        });

        $('.cancelProduct').on("click", function () {
            $('#edit').modal('hide');
            location.reload();
        });

        $('.close').on("click", function () {
            $('#edit').modal('hide');
            location.reload();
        });
    });
});