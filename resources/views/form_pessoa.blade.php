<div class="row">
    <div class="col-md-12">
        <div class="col-5 mx-auto">
             <input type="hidden" name="id_pessoa">
            <div class="form-row mb-2">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" value="{{ old('nome') ?? $pessoa->nome ?? '' }}"
                       id="nome" name="nome" placeholder="Informe seu nome" required>
            </div>

            <div class="form-row mb-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{ old('email') ?? $pessoa->email ?? '' }}"
                       id="email" name="email" aria-describedby="emailHelp" placeholder="Informe seu email" required>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('endereco.endereco_pessoa')
    </div>
</div>

