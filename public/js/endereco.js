var template_tr_endereco;

$(document).ready(function() {
    initEndereco();
});

function initEndereco() {
    template_tr_endereco = Handlebars.compile($("#template_tr_endereco").html());

    $("#bt_adicionar_endereco").click(function() {
        adicionarEndereco({});
    });

    $("#tabela_endereco").on("click", ".bt_remover_endereco", removerEndereco);

    carregarEndereco();

    $("#tabela_endereco").on("keypress", "input", function(e) {
        if (e.keyCode === 13) {
            adicionarEndereco({})
            return false;
        }
    });
}

function carregarEndereco() {
    if (!window.enderecos) {
        return;
    }
    for (var x in window.enderecos) {
        var endereco = window.enderecos[x];

        adicionarEndereco(endereco);
    }
}

function adicionarEndereco(dados) {
    dados.uniqid = uniqid();

    if (dados.id_endereco) {
        dados.uniqid = dados.id_endereco;

        $("<input>")
            .prop("type", "hidden")
            .prop("name", "endereco["+dados.uniqid+"][id_endereco]")
            .val(dados.id_endereco)
            .insertBefore($("#tabela_endereco"));
    }

    $("#tabela_endereco").find("tbody").append(template_tr_endereco(dados));

    $("#tabela_endereco").find("tr:last").find("input:first").focus();
}

function removerEndereco() {
    $(this).closest("tr").remove();
}

function uniqid() {
    var ts = String(new Date().getTime()),
        i = 0,
        out = '';
    for (i = 0; i < ts.length; i += 2) {
        out += Number(ts.substr(i, 2)).toString(36);
    }
    return ('d' + out);
}
