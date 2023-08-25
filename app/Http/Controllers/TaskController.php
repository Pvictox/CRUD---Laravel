<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Controlador relacionado com as Tasks.
    public function indexFunction(){
        return view('task.index');
    }

    public function createTask(){
        return view('task.create');
    }

    public function saveTask(Request $request){
        
    }
}
