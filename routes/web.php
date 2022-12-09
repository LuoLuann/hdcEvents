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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Route::view('/', 'home');

//immportando o controller EventController
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;

//agr passando o controller como um array
//onde passo o EventController, na rota 'index' (action)
Route::get('/', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);
//rota para habilitar o botão "saber mais" do evento mostrando o evento
Route::get('/events/{id}', [EventController::class, 'show']);

//por convenção, sempre add ao "store"
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/login', [EventController::class, 'login']);

Route::get('/events/cadastrar', [EventController::class, 'cadastrar']);

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/produtos/produtos', [ProductController::class, 'produtos']);

Route::get('/produtos/produto/{id?}', [ProductController::class, 'produto']);
