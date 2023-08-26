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
    <div class="container-fluid">
        <div class="row">
            <div class="column" id="initial-info">
                <div class="pull-left">
                    <h1>VIEW INDEX</h1>
                </div>
                <div class="pull-right">
                    <button type="button" onclick="goToCadastro()" href="javascript:void(0)" class="btn btn-primary">Create</button>
                    <button type="button" onclick="window.location = '{{route('task.read')}}'" class="btn btn-primary">Mostrar todos</button>
                </div>
            </div>
        </div>
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
            @if (session()->has('success'))
                <hr class="border border-primary border-3 opacity-75">
                <p id="msg-success">{{session('success')}}</p>
                <hr class="border border-primary border-3 opacity-75">
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="taskModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('task.save')}}" id="formTask">
                        @csrf <!-- Token de segurança -->
                        @method('post')
                        <div class="mb-3">
                        <label class="form-label">Título da Tarefa</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Digite o título">
                        <div id="emailHelp" class="form-text">Obrigatório!</div>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <input type="text" class="form-control" name="desc" placeholder="Descrição">
                        <div id="emailHelp" class="form-text">Obrigatório!</div>
                        </div>
                        <button type="submit" class="btn btn-primary" >Criar Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function goToCadastro(){
            $('#taskModal').modal('show');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>