<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UsuarioController extends Controller
{
    public function login(Request $request) {
        $dados = $request->all();

        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['password']])) {

          \Session::flash('mensagem', ['msg' => 'Login realizado com sucesso!', 'class' => 'green white-text']);
          return redirect()->route('admin.principal');

        }
        \Session::flash('mensagem', ['msg' => 'Erro! Verifique seus dados', 'class' => 'red white-text']);
        return redirect()->route('admin.login');

    }

    public function sair() {

        Auth::logout();
        return redirect()->route('admin.login');

    }

    public function index() {

        //$usuarios = User::all(); /*lista os usuarios */
        $usuarios = User::paginate(5);
        return view('admin.usuarios.index', compact('usuarios')); /*joga a lista para a view*/

    }

    public function adicionar() {

        return view('admin.usuarios.adicionar'); /*apenas joga a lista para o formulário*/

    }

    public function salvar(Request $request) {

        $dados = $request->all(); /*Pega os dados do formulário por meio da requisição (request) */
        $usuario = new User(); /*Cria um novo usuário*/
        $usuario->name     = $dados['name'];
        $usuario->email    = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
        $usuario->save();

        \Session::flash('mensagem', ['msg' => 'Registro inserido com Sucesso!', 'class' => 'green white-text']);

        return redirect()->route('admin.usuarios');

    }

    public function editar($id) {

        $usuario = User::find($id); /*pega o usuário referente ao ID*/
        return view('admin.usuarios.editar', compact('usuario')); /*jogao usuário referente ao ID para a view*/

    }

    public function atualizar(Request $request, $id) {

        $usuario = User::find($id); /*pega o usuário que será alterado-*/
        $dados = $request->all();

        if (isset($dados['password']) && strlen($dados['password']) > 5) {

              $dados['password'] = bcrypt($dados['password']);

        } else {

              unset($dados['password']);

        }

        $usuario->update($dados);
        \Session::flash('mensagem', ['msg' => 'Registro atualizado com Sucesso!', 'class' => 'green white-text']);

        return redirect()->route('admin.usuarios');

    }

    public function deletar($id) {

        User::find($id)->delete();
        \Session::flash('mensagem', ['msg' => 'Registro deletado com Sucesso!', 'class' => 'green white-text']);
        return redirect()->route('admin.usuarios');

    }























}
