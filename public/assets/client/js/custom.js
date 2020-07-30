function messageSuccess($message) {  
    toastr.success($message, 'Thông Báo', {timeOut: 5000});
}

function messageError($message) {  
    toastr.errors($message, 'Thông Báo', {timeOut: 5000});
}