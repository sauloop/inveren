<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido</title>
</head>

<body>
    <div>
        <p><strong>Recibiste un mensaje de: </strong>{{$msg['name']}} - {{$msg['email']}}</p>
        <p><strong>Asunto: </strong>{{$msg['subject']}}</p>
        <p><strong>Contenido: </strong>{{$msg['content']}}</p>
    </div>
</body>

</html>