$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    //      ---Cart-----
     $('.quantity').on("blur", function () {
         let rowId = $(this).data('id');

         $.ajax({
             url: 'cart/'+rowId,
             type: 'put',
             data: {
                quantity: $(this).val()
             },
             dataType: "json",
             success: function (response) {
                 console.log(response);
                 toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                 location.reload();
             }
         });
     });

     $('.close1').on("click", function () {
         let id = $(this).data('id');
         
         $.ajax({
             type: "DELETE",
             url: "cart/"+id,
             data:{
                id:id
             },
             dataType: "json",
             success: function (response) {
                 console.log(response);
                 toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                 location.reload();
             }
         });
     });

     //--------Them Dia chi---------
     $('.addAdress').on("click", function () {
         let email = $('.email').val();
         let phone = $('.phone').val();
         let address = $('.address').val();

         $.ajax({
             type: "post",
             url: "customer",
             data: {
                 email:email,
                 phone:phone,
                address:address
             },
             dataType: "json",
             success: function (response) {
                 console.log(response);
                 toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                 location.reload();
             },
             error: function (respose) { 
                var error = $.parseJSON(respose.responseText);
                $('.errorEmail').text(error.errors.email);
                $('.errorPhone').text(error.errors.phone);
                $('.errorAddress').text(error.errors.address);
             }
         });
     });

     $('.delAddress').on("click", function () {
         let id = $(this).data('id');

         $.ajax({
             type: "DELETE",
             url: "customer/"+id,
             data:{id:id},
             dataType: "json",
             success: function (response) {
                 console.log(response);
                 toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                 location.reload();
             }
         });
     });

     $('.payment').on("click", function () {
         var email = '';
         var phone = '';
         var address = '';
         let note = $('.note').val();
         let paytotal = $('.paytotal').text();
         paytotal = paytotal.replace(' VNĐ','');
        //  alert(paytotal);

        let rdAdress = $('input[name=rdoaddress]');
        $.each(rdAdress, function (key,value) { 
             if(value.checked == true){
                email= value.value;
                phone = $('.phone'+key).text();
                address = $('.address'+key).text();
                name = $('.name'+key).text();
             }  
        });
        $.ajax({
            type: "post",
            url: "cart",
            data: {
                email: email,
                phone: phone,
                address: address,
                message: note,
                money: paytotal,
                name: name
            },
            dataType: "json",
            success: function (response) {
                toastr.success(response.success, 'Thông báo', {timeOut: 5000});
                location.href ='/xuanvinh2';
            }
        });

     });
});