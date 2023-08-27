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
    <h1 id="title-inforgeneses">Editar Task</h1>
    <div>
        @if($errors->any()) <!--Se houver algum erro ele será mostrado em uma lista --> 
            <hr class="border border-danger border-2 opacity-50">
                <p id="msg-erro">Erro ao cadastrar Task</p>
                @foreach ($errors->all() as $erro)
                    <ul>
                        <li class="list-group-item list-group-item-danger"><p>{{$erro}}</p></li>
                    </ul>
                @endforeach
            <hr class="border border-danger border-2 opacity-50">
        @endif
    </div>
    <form method="post" action="{{route('task.update', ['tarefa' => $taskToEdit->id])}}" id="formEdit">  <!-- Método post visto que iremos capturar info. e a rota que irá atuar sobre essa captura (no caso o update dos dados no DB)-->
        @csrf <!-- Token de segurança -->
        @method('put')
        <div class="mb-3">
        <label class="form-label" id="editLabel">Título da Tarefa</label>
        <input type="text" class="form-control" name="titulo" value="{{$taskToEdit->titulo}}">
        <div  class="form-text" id="editLabel">Obrigatório!</div>
        </div>
        <div class="mb-3">
        <label class="form-label" id="editLabel">Descrição</label>
        <input type="text" class="form-control" name="desc" value="{{$taskToEdit->desc}}">
        <div class="form-text" id="editLabel">Obrigatório!</div>
        </div>    
        <input type="submit" value="Atualizar o produto" class="btn btn-success"/>
    </form>

    <button type="button" onclick="window.location = '{{route('task.read')}}'" class="btn btn-primary">Voltar</button>
</body>
</html>