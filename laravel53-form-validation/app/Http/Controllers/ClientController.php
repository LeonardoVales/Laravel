<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index() //lista os dados
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));

    }

    public function create(Request $request) //mostra o form de cadastro
    {
        $paramPessoa = $request->get('pessoa');
        $pessoa = Client::getPessoa($paramPessoa);
        return view('clients.create', compact('pessoa'));
    }
    
    public function store(Request $request) // persistir os dados no banco
    {
        $data = $request->all();
        $data['pessoa'] = Client::getPessoa($request->get('pessoa'));
        $data['inadimplente'] = false;
        Client::create($data);
        return redirect()->route('clients.index');

    }
    
    public function show($id) // mostra o form de atualizarção
    {
        
    }    

    public function edit($id) // mostra o form de atualizarção
    {
        
    }    
    
    public function update(Request $request, $id) // lógica de atualizar o registro
    {
        
    }     

    public function destroy($id) // faz o delete
    {
        
    }       
}
