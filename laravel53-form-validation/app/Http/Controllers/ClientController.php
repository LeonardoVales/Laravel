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

    public function create() //mostra o form de cadastro
    {
        return view('clients.create');
    }
    
    public function store(Request $request) // persistir os dados no banco
    {
        
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
