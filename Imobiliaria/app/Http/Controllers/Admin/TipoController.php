<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller
{

    public function index() {

        $registros = Tipo::all(); /*lista os usuarios */
        return view('admin.tipos.index', compact('registros')); /*joga a lista para a view*/

    }

    public function adicionar() {

        return view('admin.tipos.adicionar'); /*apenas joga a lista para o formulário*/

    }

    public function salvar(Request $request) {

        $dados = $request->all(); /*Pega os dados do formulário por meio da requisição (request) */
        $reigstro = new Tipo(); /*Cria um novo usuário*/
        $reigstro->titulo = $dados['titulo'];
        $reigstro->save();

        \Session::flash('mensagem', ['msg' => 'Registro inserido com Sucesso!', 'class' => 'green white-text']);

        return redirect()->route('admin.tipos');

    }

    public function editar($id) {

        $registro = Tipo::find($id); /*pega o usuário referente ao ID*/
        return view('admin.tipos.editar', compact('registro')); /*jogao usuário referente ao ID para a view*/

    }

    public function atualizar(Request $request, $id) {

        $registro = Tipo::find($id); /*pega o usuário que será alterado-*/
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->update();
        \Session::flash('mensagem', ['msg' => 'Registro atualizado com Sucesso!', 'class' => 'green white-text']);

        return redirect()->route('admin.tipos');

    }

    public function deletar($id) {

      if (Imovel::where('tipo_id', '=', $id)->count()) {

          $msg = "Não é possível deletar esse tipo!
                  Esses tipos (";
          $tipos = (Imovel::where('tipo_id', '=', $id)->get());

          foreach ($tipos as $tipo) {
              $msg .= "Id: ".$tipo->id." ";
          }

          $msg .= ") estão relacionados.";

          \Session::flash('mensagem', ['msg' => $msg, 'class' => 'red white-text']);

          return redirect()->route('admin.tipos');
      }

        Tipo::find($id)->delete();
        \Session::flash('mensagem', ['msg' => 'Registro deletado com Sucesso!', 'class' => 'green white-text']);
        return redirect()->route('admin.tipos');

    }

}
