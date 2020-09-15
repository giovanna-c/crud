
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


