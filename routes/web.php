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

/*---- MiddleWare of admin ----*/
Route::middleware(['auth', CheckRole::class . ':Admin'])->group(function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class , 'index'])->name('dashboard');
    Route::post('/createcategory' , [\App\Http\Controllers\CategorieController::class , 'create'])->name('createcategory');
    Route::post('updatecategory{id}' , [\App\Http\Controllers\CategorieController::class , 'update'])->name('/updatecategory');
    Route::get('deletecategory{id}' , [\App\Http\Controllers\CategorieController::class , 'destroy'])->name('/deletecategory');
});
/*---- End MiddleWare of admin ----*/



Route::middleware(['auth', CheckRole::class . ':Client'])->group(function () {
    Route::get('/', [\App\Http\Controllers\ClientController::class , 'index'])->name('home');
    Route::get('/reserver/{event}' , [\App\Http\Controllers\ClientController::class , 'singleevent'])->name('reserver');
    Route::post('/reservation/{event}', [\App\Http\Controllers\ReservationController::class , 'create'])->name('createreservation');
    Route::get('searchname' , [\App\Http\Controllers\ClientController::class , 'search'])->name('searchname');
    Route::get('/filterEvents', [\App\Http\Controllers\EventController::class, 'filterEvents'])->name('filterEvents');
    Route::get('/ticket/{eventId}', [\App\Http\Controllers\ReservationController::class, 'index'])->name('ticket');

});
/*---- End MiddleWare of Client ----*/



Route::middleware(['auth', CheckRole::class . ':Organizer'])->group(function () {
    Route::get('/organizer' , [\App\Http\Controllers\EventController::class , 'index'])->name('organizer');
    Route::post('/creat' , [\App\Http\Controllers\EventController::class , 'create'])->name('createevent');
    Route::post('/update{id}' , [\App\Http\Controllers\EventController::class , 'update'])->name('updateevent');
    Route::get('/delete{id}' , [\App\Http\Controllers\EventController::class , 'destroy'])->name('deleteevent');
});
/*---- End MiddleWare of organizer ----*/


Route::get('/event/{event}' , [\App\Http\Controllers\EventController::class , 'singleevent']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
