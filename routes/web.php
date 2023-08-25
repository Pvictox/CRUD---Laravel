<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return view('welcome');
});

#Criando rota para o point '/task' e nomeando para 'task.index' para implementações. 
Route::get('/task', [TaskController::class, 'indexFunction'])->name('task.index');

#Rota Create (Responsável por mostrar a view para criar task)
Route::get('/task/create', [TaskController::class, 'createTask'])->name('task.create');

#Rota para salvar uma determinada Task no BD
Route::post('task', [TaskController::class, 'saveTask'])->name('task.save');

#Novo endpoint para listar as tarefas no BD
Route::get('/task/show', [TaskController::class, 'showAll'])->name('task.read');