<?php

Auth::routes();

Route::post('/enviar-correcao', 'MailController@sendCorrecao')->name('email-correcao');
Route::post('/enviar-aprovacao', 'MailController@sendAprovacao')->name('email-aprovacao');
Route::post('/enviar-reprovacao', 'MailController@sendReprovacao')->name('email-reprovacao');

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'SiteController@atual')->name('atual');
Route::get('/atual', 'SiteController@atual')->name('atual');
Route::get('/anterior', 'SiteController@anterior')->name('anterior');
Route::get('/equipe-editorial', 'SiteController@equipe')->name('equipe');
Route::get('/contato', 'SiteController@contato')->name('contato');
Route::get('/about', 'SiteController@about')->name('about');

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function() {

    Route::get('/', 'PanelController@index')->name('panel');
    
    Route::get('/revista', 'RevistaController@create')->name('create-revista');
    Route::post('/revista','RevistaController@store')->name('store-revista');
    Route::get('/revista/lista', 'RevistaController@list')->name('list-revista');
    Route::get('/vizualizar-revista/{id}', 'RevistaController@show')->name('show-revista');
    Route::get('/atualizar-revista/{id}', 'RevistaController@edit')->name('edit-revista');
    Route::post('/atualizar-revista', 'RevistaController@update')->name('update-revista');
    Route::delete('/deletar-revista', 'RevistaController@delete')->name('delete-revista');

    Route::get('/artigo', 'ArtigoController@create')->name('create-artigo');
    Route::post('/artigo','ArtigoController@store')->name('store-artigo');
    Route::get('/artigo/lista', 'ArtigoController@list')->name('list-artigo');
    Route::get('/vizualizar-artigo/{id}', 'ArtigoController@show')->name('show-artigo');
    Route::get('/atualizar-artigo/{id}', 'ArtigoController@edit')->name('edit-artigo');
    Route::post('/atualizar-artigo', 'ArtigoController@update')->name('update-artigo');
    Route::delete('/deletar-artigo', 'ArtigoController@delete')->name('delete-artigo');

    Route::get('/submissao', 'SubmissaoController@index')->name('index-submissao');
    Route::post('/submissao', 'SubmissaoController@store')->name('store-submissao');
    Route::get('/submissoes/lista', 'SubmissaoController@list')->name('list-submissao');
    Route::get('/submissoes/lista/aprovados', 'SubmissaoController@aprovado')->name('aprovado-submissao');
    Route::get('/submissoes/lista/reprovados', 'SubmissaoController@reprovado')->name('reprovado-submissao');
    Route::get('/submissoes/lista/correcao', 'SubmissaoController@correcao')->name('correcao-submissao');
    Route::get('/vizualizar-submissao/{id}', 'SubmissaoController@show')->name('show-submissao');
    Route::any('/atualizar-submissao', 'SubmissaoController@update')->name('update-submissao');
    Route::get('/vincular/artigo/{id}', 'SubmissaoController@vincular')->name('vincular-submissao');
    Route::post('/vincular/artigo', 'SubmissaoController@storeVincular')->name('store-vincular-submissao');

    Route::get('/usuarios', 'UserController@index')->name('index-usuario'); 
    Route::get('/vizualizar-usuario/{id}', 'UserController@show')->name('show-usuario');
    Route::post('/atualizar-usuario', 'UserController@update')->name('update-usuario');

});

Route::get('/revista/info/{id}', 'SiteController@revistainfo')->name('info-revista');
Route::get('/artigo/info/{id}', 'SiteController@artigoinfo')->name('info-artigo');

