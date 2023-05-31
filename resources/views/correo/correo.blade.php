<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/correo.css" class="css">
    <title>Correo</title>


<style>
    p {
        font-size: 12px;
    }
    img{
        width: 50px;
        height: 50px;
    }
</style>

</head>
<body> 
    
    <div class="contenedor informe">
        <h3>Información de Actividad</h3>
        <div class="informe__contenido">
            @foreach ($data['actividades'] as $actividad)
                <p>ID: {{ $actividad['id'] }}</p>
                <p>Nombre: {{ $actividad['name'] }}</p>
                <p>Fecha: {{ $actividad['fecha'] }}</p>
                <p>Hora: {{ $actividad['hora'] }}</p>
                <p>Acción: {{ $actividad['accion'] }}</p>
                <p>Categoría: {{ $actividad['categoria'] }}</p>
                <p>Detalles: {{ $actividad['detalles'] }}</p>
                <hr>
             @endforeach
        
        </div>

    </div>



</body>
</html>



