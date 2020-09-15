<script id="template_tr_endereco" type="text/x-handlebars-template">
    <tr>
        <td>
            <input type="text" id="cep" value="{{cep}}" onkeypress="$(this).mask('00000-000')" class="form-control" required
                   name="endereco[{{uniqid}}][cep]" />
        </td>
        <td>
            <input type="text" value="{{cidade}}" class="form-control" required
                   name="endereco[{{uniqid}}][cidade]" />
        </td>
        <td>
            <input type="text" value="{{estado}}" class="form-control" required
                   name="endereco[{{uniqid}}][estado]" />
        </td>
        <td>
            <input type="text" value="{{bairro}}" class="form-control" required
                   name="endereco[{{uniqid}}][bairro]" />
        </td>
        <td>
            <input type="text" value="{{logradouro}}" class="form-control" required
                   name="endereco[{{uniqid}}][logradouro]" />
        </td>
        <td>
            <input type="text" value="{{complemento}}" class="form-control"
                   name="endereco[{{uniqid}}][complemento]" />
        </td>
        <td>
            <button class="btn btn-danger bt_remover_endereco">
                X
            </button>
        </td>
    </tr>
</script>
