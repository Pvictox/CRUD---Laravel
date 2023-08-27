<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;

Route::get('/', function () {
    return view('welcome');
});

#Criando rota para o point '/task' e nomeando para 'task.index' para implementações. 
Route::get('/task', [TaskController::class, 'indexFunction'])->name('task.index');

#Rota para salvar uma determinada Task no BD
Route::post('task', [TaskController::class, 'saveTask'])->name('task.save');

#Novo endpoint para listar as tarefas no BD
Route::get('/task/show', [TaskController::class, 'showAll'])->name('task.read');

#Rota que irá ser responsável por carregar a view de edição. Observe que a taks a ser mostrada para edição será representada por {tarefa}
Route::get('/task/{tarefa}/edit', [TaskController::class, 'editTask'])->name('task.edit');

#Rota que irá ativar o método de edição da respectiva {tarefa} no BD.
Route::put('/task/{tarefa}/update', [TaskController::class, 'updateTask'])->name('task.update');

#Rota que irá ativar o método de deleção da respectiva {tarefa} no BD.
Route::delete('/task/{tarefa}/delete', [TaskController::class, 'deleteTask'])->name('task.delete');

