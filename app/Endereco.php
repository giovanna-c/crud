<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco  extends Model {

    protected $fillable = ["id_pessoa", "cep", "estado", "cidade", "bairro", "logradouro", "complemento"];
    protected $table = "endereco";
    protected $guarded = ["id_endereco", "created_at", "updated_at", "deleted_at"];
    protected $primaryKey = "id_endereco";

}
