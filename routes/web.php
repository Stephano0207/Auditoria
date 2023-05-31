<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ActividadController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\BackupController;
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
    return view('dashboard');
 });


// Route::post('/proccess2',function(Request $request){
   
// });

Route::get('/login',function(){
   return view('auth.login');
})->name('login');



Route::get('/dashboard', function () {
   return view('dashboard');
});

Route::get('/mac', [ActividadController::class,'getMac'])->name('mac');

//Route::resource('carrito',CarritoController::class);
Route::resource('producto',ProductoController::class)->middleware(['auth']);
Route::resource('marca',MarcaController::class)->middleware(['auth']);

Route::resource('venta',VentaController::class)->middleware(['auth']);

Route::get('/tienda',[CartController::class,'shop'])->name('tienda')->middleware(['auth']);
Route::get('/reporteStocksProductos',[ReporteController::class,'stocks'])->middleware('auth')->name('stocks');
require __DIR__.'/auth.php';
 
Route::get('/administracion',[CarritoController::class,'home'])->name('home')->middleware(['auth']);


Route::post('/save',[VentaController::class,'save'])->middleware(['auth']);
Route::get('/actividades',[ActividadController::class,'index'])->name('actividad.index');

Route::resource('users',UserController::class)->only(['index','edit','update'])->names('admin.users');



Route::get('/shop', [CartController::class, 'shop'])->name('shop');

Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');

//Actividad Base de datos
Route::get('/administracion/backup',[BackupController::class,'index'])->name('administracion.index');
Route::get('/administracion/base_datos',[ActividadController::class,'conexion_base_datos'])->name('administracion.base');
Route::post('/administracion/backup/store',[BackupController::class,'store'])->name('administracion.backup');

Route::get('/administracion/backup/list',[BackupController::class,'list'])->name('administracion.list');

Route::post('/administracion/backup/recovery/{id}',[BackupController::class,'restore'])->name('administracion.restore');



