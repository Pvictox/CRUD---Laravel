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
        <table border="1">  
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->titulo}}</td>
                    <td>{{$task->desc}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>