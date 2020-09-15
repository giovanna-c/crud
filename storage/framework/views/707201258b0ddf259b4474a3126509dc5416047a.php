<?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php

use Illuminate\Support\Facades\Request;

$urlEditar =  Request::is('pessoa/consultar') ? 'editar/': 'pessoa/editar/';
$urlApagar =  Request::is('pessoa/consultar') ? 'apagar/': 'pessoa/apagar/';

?>

<div class="container mt-5">
    <div class="row justify-content-between mt-5">
        <div class="col-4 text-left">
            <a id="btn_voltar" class="btn btn-info" href="<?php echo e(url('/')); ?>" >Voltar</a>
        </div>
        <div class="col-4 text-center">
            <h3 class="light">Pessoas</h3>
        </div>
        <div class="col-4 text-right">
            <a id="btn_adicionar_pessoa" class="btn btn-success" href="<?php echo e(url('pessoa/cadastrar')); ?>">Adicionar Pessoa</a>
        </div>
    </div>
    <?php if(session('mensagem')): ?>
        <div class="row justify-content-center mt-3 <?php echo e(session('classeMsg')); ?>"><?php echo e(session('mensagem')); ?></div>
    <?php endif; ?>
    <div class="row mt-3">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th width="20%">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php if(empty($pessoas)): ?>
                <tr>
                    <td>Não existem pessoas cadastradas.</td>
                </tr>
            <?php else: ?>
                <?php $__currentLoopData = $pessoas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pessoa->id_pessoa); ?></td>
                        <td><?php echo e($pessoa->nome); ?></td>
                        <td><?php echo e($pessoa->email); ?></td>
                        <td>
                            <a href="<?php echo e($urlEditar . $pessoa->id_pessoa); ?>" class="btn btn-primary">Editar</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<?php if(!empty($pessoa)): ?>
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="titulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo">Excluir Pessoa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir a pessoa e os endereços relacionados a ela?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <a href="<?php echo e($urlApagar . $pessoa->id_pessoa); ?>" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/crud/crud/resources/views/pessoas.blade.php ENDPATH**/ ?>