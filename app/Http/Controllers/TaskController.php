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
    /*
        Função responsável por retornar a view referente ao index. 
    */
    public function indexFunction(){
        return view('task.index');
    }

    /*
        Função responsável por retonar a view onde irá ser mostrado os registros no BD. 
    */
    public function showAll(){
        $tasks = DB::table('task')->get(); //Realiza a busca de todas as Tasks no banco de dados. [SEMPRE RETORNAR UM ARRAY]
        /*
            Basicamente o comando abaixo retorna os registros encontrados para a view de registros (Cheque o arquivo web.php onde contém as rotas)
            O array de registros '$tasks' será passado para a view 
        */
        return view('task.read', ['tasks' => $tasks]); //Retona a view onde mostra os registros (os registros estão contidos no array $tasks)
    
    }

    /*
        Função responsável por retonar para a view de edição a task a ser editada.

        $idTask -- ID da task a ser editada. Este ID é passado pela view que mostra todos os registros.
    */
    public function editTask($idtask){
       $taskToEdit = $this->getTaskById($idtask); //É feita uma busca no BD atrás da taks com aquele ID (cheque a função abaixo)
       if ($taskToEdit){ //Condição para prevenir com que o ator tente editar uma task que não existe no BD, visto que ele poderia por um ID na url que não estivesse cadastrada.
        return view('task.edit', ['taskToEdit' => $taskToEdit]); #Retorna a view de edicão junto com a task a ser editada
       }else{
        return $this->showAll()->with('erro', 'Task não encontrada'); #Retorna para a view de listagem com uma mensagem de erro. 
       }
    }


    /*
        Função responsável por retornar uma task com base no ID passado pela view.

        $id -- ID da task a ser buscada
    */
    public function getTaskById($id){
        $resultTask = DB::select('select * from task where id = ?', [$id]); //Realiza busca [SEMPRE VAI SER UM ARRAY]
        if (sizeof($resultTask) > 0){ //Se houver resultados
            return $resultTask[0]; //Retornar o elemento encontrado. No caso vai ter sempre apenas 1 elemento visto que a busca é pelo ID.
        }else{
            return 0;
        }
    }

    /*
        Função responsável por de fato editar a taks no BD. É acionada quando o ator seleciona a opção de 'Editar tarefa' na view de Edição

        $idTask -- ID da task a ser editada no BD
        $request -- Conjunto de info. passadas através da requisicão do formulário de edição. Provenienete do método POST do formulário.
    */
    public function updateTask($idTask, Request $request){
        //Verifica se temos as informações consideradas obrigatórias.
        $validateData = $request->validate(  
            [
                'titulo' => 'required',
                'desc' => 'required'
            ]
        );
        
        //Atualiza a task daquele respectivo ID com as informações passadas.
        $rowsAffected = DB::table('task')
              ->where('id', $idTask)
              ->update($validateData);

        return redirect()->route('task.read')->with('success', 'Produto atualizado'); //Retona messagem de sucesso e redireciona para a view onde mostra os registros.
    }

    /*
        Função responsável por criar uma task no BD.
        $request -- Conjunto de info. passadas através da requisicão do formulário de edição. Provenienete do método POST do formulário.
    */
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
        return redirect()->route('task.index')->with('success', 'Task cadastrada no banco de dados'); //Redireciona para a index (OBS: Se houvesse um controlador responsável pela index e.g: autenticação, o método seria disparado)
    }

    /*
        Função responsável por deletar uma task no BD com base no ID passado pela view.

        $idTask -- ID da task a ser editada no BD
    */
    
    public function deleteTask($idTask){
        $deleted = DB::table('task')->where('id', '=', $idTask)->delete(); #Deletado com base no ID
        return redirect()->route('task.read')->with('success', 'Deletado');
    }
}
