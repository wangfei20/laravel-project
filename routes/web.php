<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('companies', App\Http\Controllers\CompanyController::class);
Route::resource('series', App\Http\Controllers\SeriesController::class);

Route::get('/companies/delete/{id}', 
           [App\Http\Controllers\CompanyController::class, 'confirmDelete'])
           ->name('companies.confirmDelete');


// Route::get('/categories', 
//     [App\Http\Controllers\CategoryController::class, 'index']);
// Route::get('/categories/create', 
//     [App\Http\Controllers\CategoryController::class, 'create']);
// Route::post('/categories', 
//     [App\Http\Controllers\CategoryController::class, 'store']);
// Route::get('/categories/{id}/edit/', 
//     [App\Http\Controllers\CategoryController::class, 'edit']);
// Route::patch('/categories/{id}', 
//     [App\Http\Controllers\CategoryController::class, 'update']);
// Route::get('/categories/{id}', 
//     [App\Http\Controllers\CategoryController::class, 'show']);
// Route::delete('/categories/{id}', 
//     [App\Http\Controllers\CategoryController::class, 'destroy']);

