@include('include.header')
<div class="container mt-5  ">
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
    <div class="row d-none justify-content-center mensagem"></div>

    <form id="form_pessoa">
        @csrf
        @include('form_pessoa')
        <div class="row mt-3 justify-content-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

<script src="{{ asset('js/pessoa.js') }}" defer></script>
@include('include.footer')
