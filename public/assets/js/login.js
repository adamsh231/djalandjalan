function submit() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var remember;
    if ($('#form_login input[type="checkbox"]').prop("checked") == true) {
        remember = true;
    } else {
        remember = false;
    }
    $.ajax({
        type: 'POST',
        url: '/login',
        timeout: 2000,
        data: {
            email: $('#form_login input[name=email]').val(),
            password: $('#form_login input[name=password]').val(),
            remember: remember,
        },
        beforeSend: function () {
            Swal.fire({
                title: 'Now Loading..',
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                    Swal.showLoading();
                }
            });
        },
        success: function (data) {
            console.log(data);
            Swal.close();
            window.location.reload();
        },
        error: function (data, errortype) {
            console.log(data.responseText);
            Swal.close();
            if (errortype == 'timeout') {
                Swal.fire({
                    title: 'Connection Time Out!',
                    icon: 'warning',
                    showConfirmButton: true,
                });
            } else {
                Swal.fire({
                    title: 'User not found!',
                    icon: 'error',
                    showConfirmButton: true,
                });
            }
        }
    });
}
