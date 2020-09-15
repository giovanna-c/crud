<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Pessoa  extends Model {

    protected $fillable = ["nome", "email"];
    protected $table = "pessoas";
    protected $guarded = ["id_pessoa", "created_at", "updated_at", "deleted_at"];
    protected $primaryKey = "id_pessoa";

    public function enderecos() {
//        return Endereco::query()
//            ->where("id_pessoa", "=", $this->id_pessoa)
//            ->get();

        return $this->hasMany("App\Endereco", "id_pessoa");
    }
}
