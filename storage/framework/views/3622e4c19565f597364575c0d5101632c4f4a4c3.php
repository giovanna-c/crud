<?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col text-left">
            <a class="btn btn-info" id="btn_visualizar_pessoas" href="<?php echo e(route('pessoa.index')); ?>" >Visualizar pessoas</a>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-4 text-center">
            <h3 class="light">Cadastrar Pessoa</h3>
        </div>
    </div>
    <?php if(session('mensagem')): ?>
        <div class="row justify-content-center mt-3 <?php echo e(session('classeMsg')); ?>"><?php echo e(session('mensagem')); ?></div>
    <?php endif; ?>

    <form  action="<?php echo e(route('atualizar',[ $pessoa->id_pessoa])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('form_pessoa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row mt-3 justify-content-center">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>

<?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/crud/crud/resources/views/edit.blade.php ENDPATH**/ ?>