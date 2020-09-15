$(document).ready(function() {

    $('.bt_excluir').click(function (e) {
        e.preventDefault();

        var url = $(this).data('url');

        $("#modalExcluir").html("<p>Tem certeza que deseja excluir essa pessoa e seus endereços?</p>").dialog({
            autoOpen: true,
            title: 'Excluir pessoa',
            buttons: {
                "Excluir" : function() {
                    $("#modalExcluir").dialog("close");
                    window.location.href = url;
                },
                "Cancelar" : function() {
                    $("#modalExcluir").dialog("close");
                }
            }
        })

    });

    $('#form_pessoa').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "store",
            type: 'post',
            data: $('#form_pessoa').serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    window.location.href = "consultar";
                } else {
                    $('.mensagem').removeClass('d-none').addClass('alert alert-danger').html(response.msg);
                }
            }
        });

    });

});
