<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="column">
                <div class="pull-left">
                    <h1>VIEW INDEX</h1>
                </div>
                <div class="pull-right">
                    <!--<button type="button" onclick="window.location = '{{route('task.create')}}'" class="btn btn-primary">Create</button>-->
                    <button type="button" onclick="goToCadastro()" href="javascript:void(0)" class="btn btn-primary">Create</button>
                    <button type="button" onclick="window.location = '{{route('task.read')}}'" class="btn btn-primary">Mostrar todos</button>
                </div>
            </div>
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
                <div>
                    @if($errors->any()) <!--Se houver algum erro ele será mostrado em uma lista -->
                        @foreach ($errors->all() as $erro)
                            <ul>
                                <li> {{$erro}} </li>
                            </ul>
                        @endforeach
                    @endif
                </div>
                <form method="post" action="{{route('task.save')}}">  <!-- Método post visto que iremos capturar info. e a rota que irá atuar sobre essa captura (no caso o salvamento dos dados no DB)-->
                    @csrf <!-- Token de segurança -->
                    @method('post')
                    <div>
                        <label>Título da Tarefa</label>
                        <input type="text" name="titulo" placeholder="Título">
                    </div>
                    <div>
                        <label>Descrição</label>
                        <input type="text" name="desc" placeholder="Descrição">
                    </div>
                    <input type="submit" value="Enviar"/>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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