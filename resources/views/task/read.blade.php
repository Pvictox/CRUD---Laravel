<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task CRUD</title>
</head>
<body>
    <h1>READ PAGE</h1>
    <div>
        @if (sizeof($tasks) > 0) <!-- Tem registros no banco -->
            <table border="1">  
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                </tr>
                @foreach ($tasks as $singleTask) <!-- -A variável $tasks (plural) é provida pelo controlador TaskController. Basicamente essa variável contém todos os registros do banco de dados.-->
                    <tr>
                        <td>{{$singleTask->id}}</td>
                        <td>{{$singleTask->titulo}}</td>
                        <td>{{$singleTask->desc}}</td>
                        <td><a href="{{route('task.edit', ['tarefa' => $singleTask->id])}}">Editar</a></td>
                        <td>
                            <form method="post" action="{{route('task.delete', ['tarefa' => $singleTask->id])}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Deletar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <h1>Sem nada no banco</h1>
        @endif

    </div>
</body>
</html>