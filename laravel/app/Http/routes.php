<?php

/*Rota do index*/
Route::get('/', function () {
    return view('site.index');
});

/*controle de acesso*/
Route::get('/controle_login', 					['as'=>'controle_login',				'uses' => 'Site\SiteController@controleLogin']);


Route::get('/cadastro', 						['as'=>'cadastro',				'uses' => 'Site\SiteController@cadastro']);
Route::post('/registrar', 						['as'=>'registrar',		   		'uses' => 'Usuarios\UsuariosController@store']);
Route::get('/entrar', 							['as'=>'entrar',				'uses' => 'Site\SiteController@entrar']);
route::get('/regras',                           ['as'=>'regras',                'uses' => 'Site\SiteController@regras']);
route::get('/faleconosco',                      ['as'=>'faleconosco',           'uses' => 'Site\SiteController@faleconosco']);


Route::get('/contato', function () {
    return view('site.contato');
});
/*ROTAS DO USUSARIO*/
Route::group(['prefix'=>'/painel',		'as'=>'painel',	'middleware'=>'auth'], function(){

	Route::get('/', 						['as'=>'.index',				'uses' => 'Usuarios\UsuariosController@index']);

	Route::group(['prefix'=>'/tema',	'as'=>'.tema'], function(){

		Route::get('/{id}', 						['as'=>'.index', 			'uses'=>'Site\TemaController@index']);
		Route::get('/pergunta/{id}/{etapa?}',		['as'=>'.pergunta',			'uses'=>'Site\TemaController@showPergunta']);
		Route::get('/perguntaAjax/{id}/{etapa?}',	['as'=>'.perguntaAjax',		'uses'=>'Site\TemaController@showPerguntaAjax']);
		Route::get('/resetar/{id}',					['as'=>'.resetar', 			'uses'=>'Site\TemaController@resetarTema']);
		Route::post('/checarResposta',				['as'=>'.checarResposta', 	'uses'=>'Site\TemaController@checarResposta']);

	});

});





/*rotas do sistema*/
/*um grupo de rotas */
Route::group(['prefix'=>'/sistema',		'as'=>'sistema',	'middleware'=>'auth'], function(){

	Route::get('/', 						['as'=>'.index',				'uses' => 'Sistema\SistemaController@index']);

	Route::group(['prefix' => '/perguntas',  'as' => '.perguntas' ], function () {
		
		Route::get('/', 						['as'=>'.index',				'uses' => 'Sistema\PerguntasController@index']);
		Route::get('/nova', 					['as'=>'.nova',					'uses' => 'Sistema\PerguntasController@create']);
		Route::post('/cadastrar', 				['as'=>'.cadastrar',		    'uses' => 'Sistema\PerguntasController@store']);
		Route::delete('/excluir/{id}', 			['as'=>'.excluir',		    	'uses' => 'Sistema\PerguntasController@destroy']);
		Route::get('/editar/{id}', 				['as'=>'.editar',		    	'uses' => 'Sistema\PerguntasController@edit']);
		Route::put('/atualizar/{id}', 			['as'=>'.atualizar',		    'uses' => 'Sistema\PerguntasController@update']);
	});

	Route::group(['prefix' => '/temas',  'as' => '.temas' ], function () {
		
		Route::get('/', 						['as'=>'.index',				'uses' => 'Sistema\TemasController@index']);
		Route::get('/nova', 					['as'=>'.nova',					'uses' => 'Sistema\TemasController@create']);
		Route::post('/cadastrar', 				['as'=>'.cadastrar',		    'uses' => 'Sistema\TemasController@store']);
		Route::delete('/excluir/{id}', 			['as'=>'.excluir',		    	'uses' => 'Sistema\TemasController@destroy']);
		Route::get('/editar/{id}', 				['as'=>'.editar',		    	'uses' => 'Sistema\TemasController@edit']);
		Route::put('/atualizar/{id}', 			['as'=>'.atualizar',		    'uses' => 'Sistema\TemasController@update']);
		Route::get('/perguntas',				['as'=>'perguntas',				'uses' => 'Sistema\TemasController@perguntas']);
	});

	Route::group(['prefix' => '/modulos',  'as' => '.modulos' ], function () {
		
		Route::get('/', 						['as'=>'.index',				'uses' => 'Sistema\ModulosController@index']);
		Route::get('/nova', 					['as'=>'.nova',					'uses' => 'Sistema\ModulosController@create']);
		Route::post('/cadastrar', 				['as'=>'.cadastrar',		    'uses' => 'Sistema\ModulosController@store']);
		Route::delete('/excluir/{id}', 			['as'=>'.excluir',		    	'uses' => 'Sistema\ModulosController@destroy']);
		Route::get('/editar/{id}', 				['as'=>'.editar',		    	'uses' => 'Sistema\ModulosController@edit']);
		Route::put('/atualizar/{id}', 			['as'=>'.atualizar',		    'uses' => 'Sistema\ModulosController@update']);
		Route::get('/temas',					['as'=>'temas',				'uses' => 'Sistema\ModulosController@temas']);
	});

	Route::group(['prefix' => '/usuarios',  'as' => '.usuarios' ], function () {
		
		Route::get('/', 						['as'=>'.index',				'uses' => 'Sistema\UsuarioController@index']);
		Route::get('/nova', 					['as'=>'.nova',					'uses' => 'Sistema\UsuarioController@create']);
		Route::post('/cadastrar', 				['as'=>'.cadastrar',		    'uses' => 'Sistema\UsuarioController@store']);
		Route::get('/editar/{id}', 				['as'=>'.editar',		    	'uses' => 'Sistema\UsuarioController@edit']);
		Route::put('/atualizar/{id}', 			['as'=>'.atualizar',		    'uses' => 'Sistema\UsuarioController@update']);
	});


});


Route::auth();

//Route::get('/home', 'HomeController@index');
