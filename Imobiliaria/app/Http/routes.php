<?php


Route::get('/', ['as' => 'site.home', function(){
    return view('site.home');
}]);


Route::get('/sobre', ['as' => 'site.sobre', 'uses' => 'site\PaginaController@sobre']);
Route::get('/contato', ['as' => 'site.contato', 'uses' => 'site\PaginaController@contato']);
Route::post('/contato/enviar', ['as' => 'site.contato.enviar', 'uses' => 'site\PaginaController@enviarContato']);

Route::get('/imovel/{id}/{titulo?}', ['as' => 'site.imovel', function(){
    return view('site.imovel');
}]);

Route::get('/admin/login',['as'=>'admin.login', function(){
	return view('admin.login.index');
}]);

Route::post('/admin/login',['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);

Route::group(['middleware' => 'auth'], function(){

        Route::get('/admin/usuarios', ['as' => 'admin.usuarios', 'uses' => 'Admin\UsuarioController@index']);
        Route::get('/admin/usuarios/adicionar', ['as' => 'admin.usuarios.adicionar', 'uses' => 'Admin\UsuarioController@adicionar']);
        Route::post('/admin/usuarios/salvar', ['as' => 'admin.usuarios.salvar', 'uses' => 'Admin\UsuarioController@salvar']);
        Route::get('/admin/usuarios/editar/{id}', ['as' => 'admin.usuarios.editar', 'uses' => 'Admin\UsuarioController@editar']);
        Route::put('/admin/usuarios/atualizar/{id}', ['as' => 'admin.usuarios.atualizar', 'uses' => 'Admin\UsuarioController@atualizar']);
        Route::get('/admin/usuarios/deletar/{id}', ['as' => 'admin.usuarios.deletar', 'uses' => 'Admin\UsuarioController@deletar']);


        Route::get('/admin', ['as' => 'admin.principal', function() {
          return view('admin.principal.index');
        } ]);

        Route::get('/admin/login/sair', ['as' => 'admin.login.sair', 'uses' => 'Admin\UsuarioController@sair']);
        /* CRUD PÁGINAS */
        Route::get('/admin/paginas', ['as' => 'admin.paginas', 'uses' => 'Admin\PaginaController@index']);
        Route::get('/admin/paginas/editar/{id}', ['as' => 'admin.paginas.editar', 'uses' => 'Admin\PaginaController@editar']);
        Route::put('/admin/paginas/atualizar/{id}', ['as' => 'admin.paginas.atualizar', 'uses' => 'Admin\PaginaController@atualizar']);
        /* CRUD TIPO DE IMÓVEL */
        Route::get('/admin/tipos', ['as' => 'admin.tipos', 'uses' => 'Admin\TipoController@index']);
        Route::get('/admin/tipos/adicionar', ['as' => 'admin.tipos.adicionar', 'uses' => 'Admin\TipoController@adicionar']);
        Route::post('/admin/tipos/salvar', ['as' => 'admin.tipos.salvar', 'uses' => 'Admin\TipoController@salvar']);
        Route::get('/admin/tipos/editar/{id}', ['as' => 'admin.tipos.editar', 'uses' => 'Admin\TipoController@editar']);
        Route::put('/admin/tipos/atualizar/{id}', ['as' => 'admin.tipos.atualizar', 'uses' => 'Admin\TipoController@atualizar']);
        Route::get('/admin/tipos/deletar/{id}', ['as' => 'admin.tipos.deletar', 'uses' => 'Admin\TipoController@deletar']);
        /* Cidades */
        Route::get('/admin/cidades', ['as' => 'admin.cidades', 'uses' => 'Admin\CidadeController@index']);
        Route::get('/admin/cidades/adicionar', ['as' => 'admin.cidades.adicionar', 'uses' => 'Admin\CidadeController@adicionar']);
        Route::post('/admin/cidades/salvar', ['as' => 'admin.cidades.salvar', 'uses' => 'Admin\CidadeController@salvar']);
        Route::get('/admin/cidades/editar/{id}', ['as' => 'admin.cidades.editar', 'uses' => 'Admin\CidadeController@editar']);
        Route::put('/admin/cidades/atualizar/{id}', ['as' => 'admin.cidades.atualizar', 'uses' => 'Admin\CidadeController@atualizar']);
        Route::get('/admin/cidades/deletar/{id}', ['as' => 'admin.cidades.deletar', 'uses' => 'Admin\CidadeController@deletar']);
        /* Imóvel */
        Route::get('/admin/imoveis', ['as' => 'admin.imoveis', 'uses' => 'Admin\ImovelController@index']);
        Route::get('/admin/imoveis/adicionar', ['as' => 'admin.imoveis.adicionar', 'uses' => 'Admin\ImovelController@adicionar']);
        Route::post('/admin/imoveis/salvar', ['as' => 'admin.imoveis.salvar', 'uses' => 'Admin\ImovelController@salvar']);
        Route::get('/admin/imoveis/editar/{id}', ['as' => 'admin.imoveis.editar', 'uses' => 'Admin\ImovelController@editar']);
        Route::put('/admin/imoveis/atualizar/{id}', ['as' => 'admin.imoveis.atualizar', 'uses' => 'Admin\ImovelController@atualizar']);
        Route::get('/admin/imoveis/deletar/{id}', ['as' => 'admin.imoveis.deletar', 'uses' => 'Admin\ImovelController@deletar']);
        /*galeria*/
        Route::get('/admin/galerias/{id}', ['as' => 'admin.galerias', 'uses' => 'Admin\ImovelController@index']);
        Route::get('/admin/galerias/adicionar/{id}', ['as' => 'admin.galerias.adicionar', 'uses' => 'Admin\GaleriaController@adicionar']);
        Route::post('/admin/galerias/salvar/{id}', ['as' => 'admin.galerias.salvar', 'uses' => 'Admin\GaleriaController@salvar']);
        Route::get('/admin/galerias/editar/{id}', ['as' => 'admin.galerias.editar', 'uses' => 'Admin\GalerialController@editar']);
        Route::put('/admin/galerias/atualizar/{id}', ['as' => 'admin.galerias.atualizar', 'uses' => 'Admin\GaleriaController@atualizar']);
        Route::get('/admin/galerias/deletar/{id}', ['as' => 'admin.galerias.deletar', 'uses' => 'Admin\GaleriaController@deletar']);





});
