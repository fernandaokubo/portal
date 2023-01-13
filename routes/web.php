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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/seunome/{nome?}',  function($nome=null){
    if(isset($nome))
        return "Ola! Seja Bem Vindo, $nome!";
    return "Você não digitou nenhum nome.";
});

Route::get('/rotacomregras/{nome}/{n}', function($nome, $n){
    for($i=0;$i<$n;$i++)
    echo "ola, seja bem vindo, $nome!<br>";
    })
    ->where('nome','[A-Za-z]+')
    ->where('n','[0-9]+');

Route::prefix('/app')->group(function(){
    Route::get('/', function(){
        return view('app');
    })->name('app');
    Route::get('/profile', function(){
        return view('profile');
    })->name('app.profile');
    Route::get('/user', function () {
        return view('user');
    })->name('app.user');
});

// Route::get('/produtos', function(){
//     echo "<h1>Produtos</h1>";
//     echo "<ol>";
//     echo "<li>Notebook</li>";
//     echo "<li>Impressora</li>";
//     echo "<li>Mouse</li>";
//     echo "</ol>";
// })->name('meusprodutos');

Route::get('produtos', function(){
    return view('outras.produtos');
})->name('produtos');

Route::get('departamentos', function(){
    return view('outras.departamentos');
})->name('departamentos');

Route::get('nome', 'App\Http\Controllers\MeuControlador@getNome');
Route::get('idade', 'App\Http\Controllers\MeuControlador@getIdade');
Route::get('multiplicar/{n1}/{n2}', 'App\Http\Controllers\MeuControlador@multiplicar');

// Route::redirect('todosProdutos', 'produtos', 301);

// Route::get('todosprodutos2', function(){
//     return redirect()->route('meusprodutos');
// });

// Route::post('/requisicoes', function (Request $request) {
//     return 'Hello POST';
// });

Route::get('nome', 'App\Http\Controllers\MeuControlador@getNome');

Route::resource('clientes', 'App\Http\Controllers\ClienteControlador');