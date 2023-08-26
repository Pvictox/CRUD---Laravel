<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>READ PAGE</h1>
    <div>
        @if (session()->has('success'))
            <hr class="border border-primary border-3 opacity-75">
            <p id="msg-success">{{session('success')}}</p>
            <hr class="border border-primary border-3 opacity-75">
        @endif
    </div>
    <div class="card-body">
        @if (sizeof($tasks) > 0) <!-- Tem registros no banco -->
            <table class="table table-striped">  
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Funcionalidades</th>
                </tr>
                @foreach ($tasks as $singleTask) <!-- -A variável $tasks (plural) é provida pelo controlador TaskController. Basicamente essa variável contém todos os registros do banco de dados.-->
                    <tr>
                        <td>{{$singleTask->id}}</td>
                        <td>{{$singleTask->titulo}}</td>
                        <td>{{$singleTask->desc}}</td>
                        <td>
                            <div id="table-op">
                                <a href="{{route('task.edit', ['tarefa' => $singleTask->id])}}">Editar</a>
                                <form method="post" action="{{route('task.delete', ['tarefa' => $singleTask->id])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Deletar" class="btn btn-danger">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <h1>Sem nada no banco</h1>
        @endif
        
        <button type="button" onclick="window.location ='{{route('task.index')}}'" class="btn btn-primary">Voltar</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>