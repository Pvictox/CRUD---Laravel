<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task CRUD</title>
</head>
<body>
    <h1>VIEW INDEX</h1>

    <button type="button" onclick="window.location = '{{route('task.create')}}' ">Create</button>
    <button type="button" onclick="window.location = '{{route('task.read')}}' ">Mostrar todos</button>
</body>
</html>