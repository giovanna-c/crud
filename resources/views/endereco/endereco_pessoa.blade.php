<div class="container mt-5">
    <div class="row justify-content-between mt-5">
        <div class="col-4 text-left">
            <h3 class="light">Endereço</h3>
        </div>
        <div class="col-4 text-right">
            <button type="button" class="btn btn-success" id="bt_adicionar_endereco">
                Adicionar Endereço
            </button>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-striped" id="tabela_endereco" width="100%">
            <thead class="thead-light">
            <tr>
                <th width="12%">CEP</th>
                <th width="15%">Cidade</th>
                <th width="15%">Estado</th>
                <th width="15%">Bairro</th>
                <th width="20%">logradouro</th>
                <th width="20%">complemento</th>
                <th width="5%">Ação</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
	var enderecos = @json(old('enderecos') ?? $pessoa->enderecos ?? []);


</script>

@include('endereco.endereco')

<script src="{{ asset('js/endereco.js') }}" defer></script>
