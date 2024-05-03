<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get("details",[ProductController::class,"details"]);
Route::get("product/{id}",[ProductController::class,"product"]);

Route::resource('products', ProductController::class);

Route::controller(StudentController::class)->group(function(){
    Route::get("student","index")->name("student.index");

    Route::get("student/new","new")->name("student.new");
    
    Route::post("student/new/add","add")->name("student.add");
    
    Route::get("student/{id}/edit","edit")->name("student.edit");
    
    Route::put("student/{id}","update")->name("student.update");
    
    Route::delete("student/{id}","destroy")->name("student.destroy");

    Route::get("student/{id}/assists","addAssist")->name("student.addAssist");

    Route::get("student/{id}/assists/list","assistList")->name("student.assistList");

});