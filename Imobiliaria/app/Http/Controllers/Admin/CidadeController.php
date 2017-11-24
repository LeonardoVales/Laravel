<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Cidade;
use App\Imovel;

class CidadeController extends Controller
{
      public function index() {

          $registros = Cidade::all(); /*lista os usuarios */
          return view('admin.cidades.index', compact('registros')); /*joga a lista para a view*/

      }

      public function adicionar() {

          return view('admin.cidades.adicionar'); /*apenas joga a lista para o formulário*/

      }

      public function salvar(Request $request) {

          $dados = $request->all(); /*Pega os dados do formulário por meio da requisição (request) */
          $reigstro = new Cidade(); /*Cria um novo usuário*/
          $reigstro->nome         = $dados['nome'];
          $reigstro->estado       = $dados['estado'];
          $reigstro->sigla_estado = $dados['sigla_estado'];
          $reigstro->save();

          \Session::flash('mensagem', ['msg' => 'Registro inserido com Sucesso!', 'class' => 'green white-text']);

          return redirect()->route('admin.cidades');

      }

      public function editar($id) {

          $registro = Cidade::find($id); /*pega o usuário referente ao ID*/
          return view('admin.cidades.editar', compact('registro')); /*jogao usuário referente ao ID para a view*/

      }

      public function atualizar(Request $request, $id) {

          $registro = Cidade::find($id); /*pega o usuário que será alterado-*/
          $dados = $request->all();
          $registro->nome         = $dados['nome'];
          $registro->estado       = $dados['estado'];
          $registro->sigla_estado = $dados['sigla_estado'];
          $registro->update();

          \Session::flash('mensagem', ['msg' => 'Registro atualizado com Sucesso!', 'class' => 'green white-text']);

          return redirect()->route('admin.cidades');

      }

      public function deletar($id) {

          if (Imovel::where('cidade_id', '=', $id)->count()) {

              $msg = "Não é possível deletar essa cidade!
                      Esses imóveis (";
              $imoveis = (Imovel::where('cidade_id', '=', $id)->get());

              foreach ($imoveis as $imovel) {
                  $msg .= "Id: ".$imovel->id." ";
              }

              $msg .= ") estão relacionados.";

              \Session::flash('mensagem', ['msg' => $msg, 'class' => 'red white-text']);

              return redirect()->route('admin.cidades');
          }

          Cidade::find($id)->delete();
          \Session::flash('mensagem', ['msg' => 'Registro deletado com Sucesso!', 'class' => 'green white-text']);

          return redirect()->route('admin.cidades');

      }

}
