<?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<div class="container mt-5">
    <div class="row mb-5">
        <div class="col text-center">
            <h3>Olá, seja bem vindo(a) escolha uma opção para prosseguir!</h3>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col text-right">
            <a class="btn btn-info btn-lg" id="btn_visualizar_pessoas" href="<?php echo e(route('pessoa.index')); ?>" >Visualizar Pessoas</a>
        </div>
        <div class="col text-left">
            <a class="btn btn-success btn-lg" id="btn_adicionar_pessoa" href="<?php echo e(url('pessoa/cadastrar')); ?>">Cadastrar Pessoa</a>
        </div>
    </div>
</div>

<?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php /**PATH /var/www/html/crud/crud/resources/views/index.blade.php ENDPATH**/ ?>