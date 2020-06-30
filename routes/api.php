<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', 'Auth\APIController@login');

Route::post('register', 'Auth\APIController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
	Route::post('logout', 'Auth\APIController@logout');
	Route::post('refresh', 'Auth\APIController@refresh');

	/**
	 * Empresa
	 */
	Route::group(['prefix' => 'empresa'], function () {
		Route::get('/', 'EmpresaController@list');
		Route::get('/{empresa}', 'EmpresaController@get');
		Route::post('/', 'EmpresaController@create');
		Route::put('/{empresa}', 'EmpresaController@update');
		Route::delete('/{empresa}', 'EmpresaController@delete');
	});

	/**
	 * Log
	 */
	Route::group(['prefix' => 'log'], function () {
		Route::get('/', 'LogController@list');
		Route::get('/{log}', 'LogController@get');
		Route::post('/', 'LogController@create');
	});

	/**
	 * User
	 */
	Route::group(['prefix' => 'user'], function () {
		Route::get('/', 'UserController@list');
		Route::get('/{user}', 'UserController@get');
		Route::post('/', 'UserController@create');
		Route::put('/{user}', 'UserController@update');
		Route::delete('/{user}', 'UserController@delete');
	});

	/**
	 * UsuarioEmpresa
	 */
	Route::group(['prefix' => 'usuario-empresa'], function () {
		Route::get('/', 'UsuarioEmpresaController@list');
		Route::get('/{usuarioEmpresa}', 'UsuarioEmpresaController@get');
		Route::post('/', 'UsuarioEmpresaController@create');
		Route::put('/{usuarioEmpresa}', 'UsuarioEmpresaController@update');
		Route::delete('/{usuarioEmpresa}', 'UsuarioEmpresaController@delete');
	});
});
