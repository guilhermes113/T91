<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

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
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
| Thomas Melo - 19-09-2022
*/
Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group( function(){
        Route::get('/', function () { 
            return view('dashboard');
        })->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| Cliente
|--------------------------------------------------------------------------
*/
Route::prefix('cliente')
->middleware(['auth'])
->controller(ClienteController::class)
->group(function () {
    Route::get('/' , 'index')->name('cliente.index');
    Route::get('/novo', 'create')->name('cliente.create');
    Route::get('/editar/{id}', 'edit')->name('cliente.edit');
    Route::get('/mostrar/{id}', 'show')->name('cliente.show');
    Route::post('/cadastrar', 'store')->name('cliente.store');
    Route::post('/atualizar/{id}', 'update')->name('cliente.update');
    Route::post('/deletar/{id}', 'destroy')->name('cliente.destroy');

});
/*
|--------------------------------------------------------------------------
| Produto
|--------------------------------------------------------------------------
*/
Route::prefix('produto')
->middleware(['auth'])
->controller(ProdutoController::class)
->group(function () {
    Route::get('/' , 'index')->name('produto.index');
    Route::get('/novo', 'create')->name('produto.create');
    Route::get('/editar/{id}', 'edit')->name('produto.edit');
    Route::get('/mostrar/{id}', 'show')->name('produto.show');
    Route::post('/cadastrar', 'store')->name('produto.store');
    Route::post('/atualizar/{id}', 'update')->name('produto.update');
    Route::post('/deletar/{id}', 'destroy')->name('produto.destroy');

});





require __DIR__.'/auth.php';
