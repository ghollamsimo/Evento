<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*---- MiddleWare for admin ----*/
Route::middleware(['auth', CheckRole::class . ':Admin'])->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class , 'index'])->name('dashboard');
    Route::post('create' , [\App\Http\Controllers\CategorieController::class , 'create'])->name('/createcategory');
    Route::post('update{id}' , [\App\Http\Controllers\CategorieController::class , 'update'])->name('/updatecategory');
    Route::get('delete{id}' , [\App\Http\Controllers\CategorieController::class , 'destroy'])->name('/deletecategory');
});
/*---- End MiddleWare for admin ----*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth', CheckRole::class . ':Organizer'])->group(function () {
    Route::get('organizer' , [\App\Http\Controllers\EventController::class , 'index'])->name('/organizer');
    Route::post('/create' , [\App\Http\Controllers\EventController::class , 'create'])->name('createevent');
    Route::post('/update{id}' , [\App\Http\Controllers\EventController::class , 'update'])->name('updateevent');
    Route::get('delete{id}' , [\App\Http\Controllers\EventController::class , 'destroy'])->name('deleteevent');
});
/*---- End MiddleWare for organizer ----*/




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
