<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

//Controlador relacionado com as Tasks.
class TaskController extends Controller
{
    //Retorna a view index
    public function indexFunction(){
        return view('task.index');
    }

    //Retorna a view create
    public function createTask(){
        return view('task.create');
    }

    //Retorna a view 'read.blade' e lista dados no BD.
    public function showAll(){
        $tasks = DB::table('task')->get();
        return view('task.read', ['tasks' => $tasks]);
    
    }

    public function saveTask(Request $request){
        #Setamos o conjunto de atributos que são necessários.
        $validateData = $request->validate(  
            [
                'titulo' => 'required',
                'desc' => 'required'
            ]
        );

        #Criando um novo registro no DB com base nos dados validados
        DB::table('task')->insert(
            array(
                'titulo' => $validateData['titulo'],
                'desc' => $validateData['desc'],
                'created_at' => Carbon::now(),  //Obtém o tempo de criação do registro
            )
            );
        return redirect()->route('task.index'); //Redireciona para a index (OBS: Se houvesse um controlador responsável pela index e.g: autenticação, o método seria disparado)
    }
}
