<!DOCTYPE html>
<html>
<head>
    <title>Detalle Venta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Cliente :  {{Auth::user()->name}}</p>
    <p>Correo  :  {{Auth::user()->email}}</p>
  
    <table class="table table-bordered">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
        @foreach($datos as $dato)
        <tr>
            <td>{{ $dato->nombre }}</td>
            <td>{{ $dato->cantidad }}</td>
            <td>{{ $dato->precio }}</td>
            <td>{{ $dato->subtotal }}</td>
        </tr>
        @endforeach
    </table>
    
   
    <p>Total:  {{$total[0]->total}}  </p>
   
</body>
</html>