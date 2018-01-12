@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <h3>Novo Cliente</h3>
        <form action="{{ route('clients.store') }}" method="POST" class="form">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="form-group">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" name="documento" id="documento">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>     

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone">
            </div>   

            <div class="form-group">
                <label for="estado_civil">Estado Civil</label>
                <select name="estado_civil" id="estado_civil" class="form-control">
                    <option value="0">Selecione</option>
                    @foreach(\App\Client::ESTADOS_CIVIS as $key => $value)
                        <option value="{{ $key }}">{{ $value }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="data_nasci">Data Nascimento</label>
                <input type="date" class="form-control" name="data_nasci" id="data_nasci">
            </div>    


            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="sexo" value="m" id=""> Masculino
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" name="sexo" value="f" id=""> Feminino
                </label>
            </div>  

            <div class="form-group">
                <label for="deficiencia_fisica">Deficiencia Fisica</label>
                <input type="text" class="form-control" name="deficiencia_fisica" id="deficiencia_fisica">
            </div>    

            <div class="checkbox">
                <labe>
                    <input type="checkbox" name="inadimplente" value="inadimplente" id=""> Inadimplente?
                </label>
            </div> 

            <div class="form-group">
                <input type="submit" value="Criar Cliente" class="btn btn-primary">
            </div>              
                    
        
        </form>



    </div>
</div>

@endsection