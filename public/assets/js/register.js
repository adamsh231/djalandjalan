function submit(url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var isAgree;
    if ($('#form_register input[type="checkbox"]').prop("checked") == true) {
        isAgree = true;
    } else {
        isAgree = false;
    }
    $.ajax({
        type: 'POST',
        url: '/register',
        timeout: 2000,
        data: {
            name: $('#form_register input[name=name]').val(),
            email: $('#form_register input[name=email]').val(),
            password: $('#form_register input[name=password]').val(),
            phone: $('#form_register input[name=phone]').val(),
            agreement: isAgree,
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
            arr_err = ['name', 'email', 'password', 'phone', 'agreement'];
            for (let index = 0; index < arr_err.length; index++) {
                $('#form_register small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
            }
        },
        success: function (data) {
            console.log(data);
            Swal.close();
            Swal.fire({
                title: 'Registration Success!',
                text: 'Please verify your email address, Redirect..',
                icon: 'success',
                allowEscapeKey: false,
                allowOutsideClick: false,
                showConfirmButton: false,
                timer: 2000,
            }).then(function(){
                window.location.href = url;
            });
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
                var errors = $.parseJSON(data.responseText);
                arr_err = ['name', 'email', 'password', 'phone', 'agreement'];
                for (let index = 0; index < arr_err.length; index++) {
                    if (errors.messages[arr_err[index]] === undefined) {
                        $('#form_register small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
                    } else {
                        $('#form_register small[name=' + arr_err[index] + ']').html(errors.messages[arr_err[index]]);
                        $('#form_register small[name=' + arr_err[index] + ']').removeClass('d-none').addClass('d-block');
                    }
                }
            }
        }
    });
}
