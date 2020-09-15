@include('include.header')
<div class="container mt-5">
    <div class="row">
        <div class="col text-left">
            <a class="btn btn-info" id="btn_visualizar_pessoas" href="{{ route('pessoa.index') }}" >Visualizar pessoas</a>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-4 text-center">
            <h3 class="light">Cadastrar Pessoa</h3>
        </div>
    </div>
    @if(session('mensagem'))
        <div class="row justify-content-center mt-3 {{session('classeMsg')}}">{{session('mensagem')}}</div>
    @endif

    <form  action="{{ route('atualizar',[ $pessoa->id_pessoa]) }}" method="post">
        @csrf
        @include('form_pessoa')
        <div class="row mt-3 justify-content-center">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>

@include('include.footer')
