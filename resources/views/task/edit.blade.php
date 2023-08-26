<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task CRUD</title>
</head>
<body>
    <h1>Edit Task</h1>
    <div>
        @if($errors->any()) <!--Se houver algum erro ele será mostrado em uma lista -->
            @foreach ($errors->all() as $erro)
                <ul>
                    <li> {{$erro}} </li>
                </ul>
            @endforeach
        @endif
    </div>
    <form method="post" action="{{route('task.update', ['tarefa' => $taskToEdit->id])}}">  <!-- Método post visto que iremos capturar info. e a rota que irá atuar sobre essa captura (no caso o update dos dados no DB)-->
        @csrf <!-- Token de segurança -->
        @method('put')
        <div>
            <label>Título da Tarefa</label>
            <input type="text" name="titulo" placeholder="Título" value="{{$taskToEdit->titulo}}">
        </div>
        <div>
            <label>Descrição</label>
            <input type="text" name="desc" placeholder="Descrição" value="{{$taskToEdit->desc}}">
        </div>
        <input type="submit" value="Atualizar o produto"/>
    </form>
</body>
</html>