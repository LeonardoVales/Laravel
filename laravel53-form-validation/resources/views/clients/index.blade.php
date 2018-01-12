@extends('layouts.app')

    @section('title')
        Listando Clientes
    @endsection

@section('content')

<div class="container">
    <div class="row">
        <h1>Listagem de Clientes</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Novo Cliente</a>
    </div>
    <div class="row">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ/CPF</th>
                <th>Data Nasc</th>
                <th>E-mailD</th>
                <th>Telefone</th>
                <th>Sexo</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->nome }}</td>
                    <td>{{ $client->documento }}</td>
                    <td>{{ $client->data_nasc }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->telefone }}</td>
                    <td>{{ $client->sexo }}</td>
                    <td>Ações</td>

                </tr>
            @endforeach
        </tbody>

    </table>    
    </div>
</div>


@endsection