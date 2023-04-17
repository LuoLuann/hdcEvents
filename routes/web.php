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

//esse middleware serve para garantir que o user esteja logado para criar evento
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
//rota para habilitar o botão "saber mais" do evento mostrando o evento
Route::get('/events/{id}', [EventController::class, 'show']);
Route::get('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

//por convenção, sempre add ao "store"
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/login', [EventController::class, 'login']);

Route::get('/events/cadastrar', [EventController::class, 'cadastrar']);

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/produtos/produtos', [ProductController::class, 'produtos']);

Route::get('/produtos/produto/{id?}', [ProductController::class, 'produto']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
