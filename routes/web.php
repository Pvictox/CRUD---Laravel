<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return view('welcome');
});

#Criando rota para o point '/task' e nomeando para 'task.index' para implementações. 
Route::get('/task', [TaskController::class, 'indexFunction'])->name('task.index');

#Rota para salvar uma determinada Task no BD
Route::post('task', [TaskController::class, 'saveTask'])->name('task.save');

#Novo endpoint para listar as tarefas no BD
Route::get('/task/show', [TaskController::class, 'showAll'])->name('task.read');

Route::get('/task/{tarefa}/edit', [TaskController::class, 'editTask'])->name('task.edit');

Route::put('/task/{tarefa}/update', [TaskController::class, 'updateTask'])->name('task.update');

Route::delete('/task/{tarefa}/delete', [TaskController::class, 'deleteTask'])->name('task.delete');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
