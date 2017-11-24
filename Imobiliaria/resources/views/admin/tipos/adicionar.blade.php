@extends('layouts.app')


@section('content')

<div class="container">

      <h2 class="center">Adicionar tipos de Imóveis</h2>

      <div class="row">

            <nav>

                <div class="nav-wrapper green">

                      <div class="col s12">

                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href=" {{route('admin.tipos')}} " class="breadcrumb">Listar tipos de Imóveis</a>
                        <a class="breadcrumb">Adicionar tipos de Imóveis</a>

                      </div>

                </div>

            </nav>

      </div>
      <div class="row">

          <form class="" action="{{ route('admin.tipos.salvar') }}" method="post">
              {{ csrf_field() }}

              @include('admin.tipos._form')

              <button class="btn blue">Adicionar</button>

          </form>

      </div>
</div>



@endsection
