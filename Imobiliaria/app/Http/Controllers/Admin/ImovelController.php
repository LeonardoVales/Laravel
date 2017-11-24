<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use App\Cidade;

class ImovelController extends Controller
{
  public function index() {

      $registros = Imovel::all(); /*lista os usuarios */
      return view('admin.imoveis.index', compact('registros')); /*joga a lista para a view*/

  }

  public function adicionar() {

      $tipos   = Tipo::all();
      $cidades = Cidade::all();

      return view('admin.imoveis.adicionar', compact('tipos', 'cidades')); /*apenas joga a lista para o formulário*/

  }

  public function salvar(Request $request) {

      $dados = $request->all(); /*Pega os dados do formulário por meio da requisição (request) */
      $registro = new Imovel(); /*Cria um novo usuário*/

      $registro->titulo        = $dados['titulo'];
      $registro->descricao     = $dados['descricao'];
      $registro->status        = $dados['status'];
      $registro->status        = $dados['status'];
      $registro->endereco      = $dados['endereco'];
      $registro->cep           = $dados['cep'];
      $registro->valor         = $dados['valor'];
      $registro->dormitorios   = $dados['dormitorios'];
      $registro->detalhes      = $dados['detalhes'];
      $registro->visualizacoes = 0;
      $registro->publicar      = $dados['publicar'];

      if(isset($dados['mapa']) && trim($dados['mapa']) != "" ){
          $registro->mapa = trim($dados['mapa']);
      }else{
          $registro->mapa = null;
      }

      $registro->cidade_id = $dados['cidade_id'];
      $registro->tipo_id   = $dados['tipo_id'];

      $file = $request->file('imagem');
      if($file) {

          $rand        = rand(11111, 99999);
          $diretorio   = "img/imoveis/".str_slug($dados['titulo'],'_')."/";
          $ext         = $file->guessClientExtension();
          $nomeArquivo = "_img_".$rand.".".$ext;
          $file->move($diretorio, $nomeArquivo);
          $registro->imagem = $diretorio.'/'.$nomeArquivo;

      }

      $registro->save();

      \Session::flash('mensagem', ['msg' => 'Registro inserido com Sucesso!', 'class' => 'green white-text']);

      return redirect()->route('admin.imoveis');

  }

  public function editar($id) {

      $registro = Imovel::find($id); /*pega o usuário referente ao ID*/
      $tipos    = Tipo::all();
      $cidades  = Cidade::all();

      return view('admin.imoveis.editar', compact('registro', 'tipos', 'cidades')); /*apenas joga a lista para o formulário*/

  }

  public function atualizar(Request $request, $id) {

      $registro = Imovel::find($id); /*pega o usuário que será alterado-*/
      $dados = $request->all();

      $registro->titulo        = $dados['titulo'];
      $registro->descricao     = $dados['descricao'];
      $registro->status        = $dados['status'];
      $registro->status        = $dados['status'];
      $registro->endereco      = $dados['endereco'];
      $registro->cep           = $dados['cep'];
      $registro->valor         = $dados['valor'];
      $registro->dormitorios   = $dados['dormitorios'];
      $registro->detalhes      = $dados['detalhes'];
      $registro->publicar      = $dados['publicar'];

      if(isset($dados['mapa']) && trim($dados['mapa']) != "" ){
          $registro->mapa = trim($dados['mapa']);
      }else{
          $registro->mapa = null;
      }

      $registro->cidade_id = $dados['cidade_id'];
      $registro->tipo_id   = $dados['tipo_id'];

      $file = $request->file('imagem');
      if($file) {

          $rand        = rand(11111, 99999);
          $diretorio   = "img/imoveis/".str_slug($dados['titulo'],'_')."/";
          $ext         = $file->guessClientExtension();
          $nomeArquivo = "_img_".$rand.".".$ext;
          $file->move($diretorio, $nomeArquivo);
          $registro->imagem = $diretorio.'/'.$nomeArquivo;

      }
      $registro->update();

      \Session::flash('mensagem', ['msg' => 'Registro atualizado com Sucesso!', 'class' => 'green white-text']);

      return redirect()->route('admin.imoveis');

  }

  public function deletar($id) {

      Imovel::find($id)->delete();
      \Session::flash('mensagem', ['msg' => 'Registro deletado com Sucesso!', 'class' => 'green white-text']);

      return redirect()->route('admin.imoveis');

  }

}
