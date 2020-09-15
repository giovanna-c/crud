$(document).ready(function() {

    $('#form_pessoa').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "store",
            type: 'post',
            data: $('#form_pessoa').serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    console.log(response);
                    window.location.href = "consultar";
                } else {
                    $('.mensagem').removeClass('d-none').addClass('alert alert-danger').html(response.msg);
                }
            }
        });

    });

});


