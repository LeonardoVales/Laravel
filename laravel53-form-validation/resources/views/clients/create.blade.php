@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        
        <h3>Novo Cliente</h3>
        <h4>{{ $pessoa == \App\Client::PESSOA_JURIDICA ? 'Pessoa Juridica' : 'Pessoa Física' }}</h4>
        <a href="{{ route('clients.create',['pessoa' => \App\Client::PESSOA_FISICA]) }}">Pessoa Física</a>
        <a href="{{ route('clients.create',['pessoa' => \App\Client::PESSOA_JURIDICA]) }}">Pessoa Jurídica</a>
        <br/><br/>
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('clients.store') }}" method="POST" class="form">
            {{csrf_field()}}
            <input type="hidden" name="pessoa" vlaue="{{$pessoa}}"/>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="form-group">
                <label for="documento">{{ $pessoa == \App\Client::PESSOA_JURIDICA ? 'CNPJ' : 'CPF' }}</label>
                <input type="text" class="form-control" name="documento" id="documento">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>    

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="telefone" class="form-control" name="telefone" id="telefone">
            </div>              

 
        @if($pessoa == \App\Client::PESSOA_JURIDICA)
        <div class="form-group">
                <label for="fantasia">Fantasia</label>
                <input type="text" class="form-control" name="fantasia" id="fantasia">
        </div>  
        @else
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
        @endif


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