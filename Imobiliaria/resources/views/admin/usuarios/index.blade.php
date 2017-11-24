@extends('layouts.app')


@section('content')

      <div class="container">
            <h2 class="center">Lista de Usuários</h2>
            <div class="row">

                <nav>

                  <div class="nav-wrapper green">

                    <div class="col s12">

                      <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                      <a  class="breadcrumb">Lista de Usuários</a>

                    </div>

                  </div>

                </nav>

            </div>

            <div class="row">
                <table>

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ação</th>

                        </tr>

                    </thead>

                    <tbody>

                      @foreach($usuarios as $usuario)

                        <tr>

                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>

                                <a class="btn orange" href="{{ route('admin.usuarios.editar', $usuario->id) }}">Editar</a>
                                <a class="btn red" href="javascript: if(confirm('Deletar esse registro?')) {window.location.href = '{{route('admin.usuarios.deletar', $usuario->id)}}'}">Deletar</a>

                            </td>

                        </tr>

                      @endforeach

                    </tbody>

                </table>
                  {!! $usuarios->links() !!}
            </div>
            <div class="row">

                <a class="btn blue" href="{{ route('admin.usuarios.adicionar') }}">Adicionar</a>

            </div>
      </div>

@endsection
