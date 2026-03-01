<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



Route::get('/', [HomeController::class, 'index'])->name("home")->middleware("auth");

Route::resource('tasks', \App\Http\Controllers\TasksController::class)
    ->missing(function (Request $request) {
    return Redirect::route('tasks.index');
})->names([
    'create' => 'tasks.create',
    'store' => 'tasks.store',
    'edit' => 'tasks.edit',
    'update' => 'tasks.update',
    'destroy' => 'tasks.destroy',
    'index' => 'tasks',
    ]);
