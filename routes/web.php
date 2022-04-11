 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeworksController;
use App\Http\Controllers\CategoriesController;
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

// DIFINIR LA RUTA
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('layout.index');
})->name('home');

Route::get('/service', function () {
    return 'Hola a todos desde esta ruta';
});

//RUTA

//OBTEBER LA INFORMACION DE LA TABLA
Route::get('/home',[HomeworksController::class, 'index'])->name('show-task');

//AGREGAR LA INFORMACION DE LA TABLA
Route::post('/home',[HomeworksController::class, 'store'])->name('addtask');

//Mostrar una información especifico
Route::get('/home/{id}',[HomeworksController::class, 'show'])->name('homeworks-edit');

//ACTUALIZAR LA INFORMACION ESPECIFICO
Route::patch('/home/{id}',[HomeworksController::class, 'update'])->name('homeworks-update');

//ELIMINAR LA INFORMACION DE LA TABLA
Route::delete('/home/{id}',[HomeworksController::class, 'destroy'])->name('homeworks-destroy');

//OTRA FORMA DE IMPORTAR TODAS LAS RUTAS
Route::resource('categories',CategoriesController::class);