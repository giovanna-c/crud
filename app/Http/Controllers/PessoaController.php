<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Pessoa;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PessoaController extends Controller {

    /**
     * Retorna a view para listar as pessoas
     * @return Factory|View
     *
     * @author Giovanna Carla
     * @since 1.0.0
     */
    public function index() {
        $pessoas = Pessoa::all();

        return view('pessoas')->with('pessoas', $pessoas);
    }

    /**
     * Retorna o formulário para cadastrar a pessoa
     * @author Giovanna Carla
     * @return Factory|View
     *
     * @since 1.0.0
     */
    public function create() {
        return view('create');
    }

    /**
     * Salva os dados da pessoa
     * @param Request $request
     * @author Giovanna Carla
     * @return false|string
     *
     * @since 1.0.0
     */
    public function store(Request $request) {
        try{
            $this->validarDadosFormulario($request);

            DB::transaction(function () use ($request) {
                $pessoa = new Pessoa();
                $pessoa->nome = $request->nome;
                $pessoa->email = $request->email;
                $pessoa->save();

                $arrayEndereco = $request->endereco;
                foreach ($request->endereco as $arrayEndereco) {
                    $endereco = new Endereco();
                    $endereco->id_pessoa = $pessoa->getAttribute('id_pessoa');
                    $endereco->cep = $arrayEndereco['cep'];
                    $endereco->cidade =  $arrayEndereco['cidade'];
                    $endereco->estado =  $arrayEndereco['estado'];
                    $endereco->bairro =  $arrayEndereco['bairro'];
                    $endereco->logradouro =  $arrayEndereco['logradouro'];
                    $endereco->complemento =  $arrayEndereco['complemento'];
                    $endereco->save();
                }

            });

            $retorno = [
                "status" => true,
                "msg" => "Pessoa cadastrada com sucesso!"
            ];

        } catch (Exception $e) {
            $retorno = [
                "status" => false,
                "msg" => "Ocorreu um erro ao cadastrar a pessoa: " . $e->getMessage()
            ];
        }

        return json_encode($retorno);
    }

    /**
     * Retorna a view para alterar os dados da pessoa
     * @param int $id
     * @author Giovanna Carla
     * @return Factory|View
     *
     * @since 1.0.0
     */
    public function edit(int $id) {
        $pessoa = Pessoa::find($id);
        return view('edit',compact('pessoa'));
    }


    /**
     * Valida os campos obrigatórios do formulário
     * @param Request $request
     * @author Giovanna Carla
     * @return void
     * @throws ValidationException
     *
     * @since 1.0.0
     */
    private function validarDadosFormulario(Request $request) {

        $this->validate(
            $request,
            [
                'nome' => 'required',
                'email' => 'required',
                'endereco' => 'required',
            ],
            [
                'nome.required' => 'O nome precisa ser informado!',
                'email.required' => 'O email precisa ser informado!',
                'endereco.required' => 'Informe pelo menos um endereco!',
            ]
        );
    }

    /**
     * Atualiza os dados da pessoa
     * @param Request $request
     * @param $id
     * @author Giovanna Carla
     * @return RedirectResponse
     *
     * @since 1.0.0
     */
    public function update(Request $request, $id) {
        try{
            $this->validarDadosFormulario($request);

            DB::transaction(function () use ($request, $id) {
                $pessoa = Pessoa::find($id);
                $pessoa->nome = $request->nome;
                $pessoa->email = $request->email;
                $pessoa->save();

                foreach ($request->endereco as $arrayEndereco) {
                    if (!empty($arrayEndereco['id_endereco'])) {
                        if (!empty($arrayEndereco['cep'])) {
                            $pessoa->enderecos()->updateOrCreate(
                                ['id_endereco' => $arrayEndereco['id_endereco']],
                                $arrayEndereco
                            );
                        } else {
                            $pessoa->enderecos()->where('id_endereco', '=', $arrayEndereco['id_endereco'])->delete();
                        }
                    } else {
                        $pessoa->enderecos()->create($arrayEndereco);
                    }
                }

            });

            return redirect()->route('pessoa.index')
                ->with('mensagem',  "Pessoa atualizada com sucesso!")
                ->with('pessoas',  Pessoa::all())
                ->with('classeMsg', "alert alert-success");

        } catch (Exception $e) {

            return Redirect::back()
                ->with('mensagem', "Ocorreu um erro ao atualizar os dados da pessoa: " . $e->getMessage())
                ->with('pessoas',  Pessoa::all())
                ->with('classeMsg', "alert alert-danger");
        }


    }

    /**
     * Apaga os dados da pessoa
     * @param int $id
     * @author Giovanna Carla
     * @return RedirectResponse
     *
     * @since 1.0.0
     */
    public function destroy(int $id) {
        try{
            $pessoa = Pessoa::find($id);
            $pessoa->delete();

            $mensagem = "Pessoa removida com sucesso!";
            $classe = "alert alert-success";

        } catch (Exception $e) {
            $mensagem = "Ocorreu um erro ao excluir a pessoa: " . $e->getMessage();
            $classe = "alert alert-danger";
        }

        return redirect()->route('pessoa.index')
            ->with('mensagem', $mensagem)
            ->with('pessoas',  Pessoa::all())
            ->with('classeMsg', $classe);
    }
}
