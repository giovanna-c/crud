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
	var enderecos = <?php echo json_encode(old('enderecos') ?? $pessoa->enderecos ?? [], 15, 512) ?>;


</script>

<?php echo $__env->make('endereco.endereco', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('js/endereco.js')); ?>" defer></script>
<?php /**PATH /var/www/html/crud/crud/resources/views/endereco/endereco_pessoa.blade.php ENDPATH**/ ?>