@include('include.header')

<?php

use Illuminate\Support\Facades\Request;

$urlEditar =  Request::is('pessoa/consultar') ? 'editar/': 'pessoa/editar/';
$urlApagar =  Request::is('pessoa/consultar') ? 'apagar/': 'pessoa/apagar/';

?>

<div class="container mt-5">
    <div class="row justify-content-between mt-5">
        <div class="col-4 text-left">
            <a id="btn_voltar" class="btn btn-info" href="{{ url('/') }}" >Voltar</a>
        </div>
        <div class="col-4 text-center">
            <h3 class="light">Pessoas</h3>
        </div>
        <div class="col-4 text-right">
            <a id="btn_adicionar_pessoa" class="btn btn-success" href="{{ url('pessoa/cadastrar') }}">Adicionar Pessoa</a>
        </div>
    </div>
    @if(session('mensagem'))
        <div class="row justify-content-center mt-3 {{session('classeMsg')}}">{{session('mensagem')}}</div>
    @endif
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
            @if (empty($pessoas))
                <tr>
                    <td>Não existem pessoas cadastradas.</td>
                </tr>
            @else
                @foreach ($pessoas as $pessoa)
                    <tr>
                        <td>{{$pessoa->id_pessoa}}</td>
                        <td>{{$pessoa->nome}}</td>
                        <td>{{$pessoa->email}}</td>
                        <td>
                            <a href="{{$urlEditar . $pessoa->id_pessoa}}" class="btn btn-primary">Editar</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</div>

@if (!empty($pessoa))
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
                <a href="{{$urlApagar . $pessoa->id_pessoa}}" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </div>
</div>
@endif
@include('include.footer')
