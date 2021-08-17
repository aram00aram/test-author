<?php

use App\Http\Controllers\Tasks\TaskController;
use Illuminate\Support\Facades\Route;



Route::resource('/', TaskController::class);
Route::delete("/destroy_task",[TaskController::class,'destroy'])->name("task.destroy");

Route::get("filter/{status?}/{author?}", [TaskController::class,'filter']);
