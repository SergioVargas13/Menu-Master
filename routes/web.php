<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->resource('role', 'RoleController');
Route::middleware('auth')->resource('user', 'UserController');
Route::middleware('auth')->post('user/cambiarRole', 'UserController@cambiarRole');
Route::middleware('auth')->post('user/guardarRole', 'UserController@guardarRole');
//Route::middleware('auth')->get('addAprendiz/{curso_id}', 'CursoAprendizController@addAprendiz');

Route::middleware('auth')->get('nombre', function(){
	//echo var_dump(Auth::user()->roles()->get());
});

Route::resource('visita', 'visitascontroller');
Route::resource('curso', 'CursoController');
Route::resource('aprendiz', 'CursoAprendizController');
Route::resource('productos', 'ProductoController');
Route::resource('factura', 'FacturaController');
Route::resource('producto', 'FacturaProductoController');
Route::resource('pedidos', 'PedidoController');
Route::resource('mesas', 'MesaController');

Route::any('saludo/{nombre}/{apellido}', function($nombre, $apellido) {
	echo "Hola $nombre $apellido <br>";
});

Route::get('sume/{n1}/{n2}', function($n1, $n2) {
	echo " La suma es ".($n1+$n2);
});

Route::get('producto/{n1}/{n2}', function($n1, $n2) {
	echo " La suma es ".($n1*$n2);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
