<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovel;

class ImovelController extends Controller
{
  
    public function index()
    {
        
    }

  
    public function create()
    {
        return view('imoveis.create');
    }


    public function store(Request $request)
    {
        $dados = $request->all();
        Imovel::create($dados);

        return redirect()->route('imoveis.index');
    }


    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
