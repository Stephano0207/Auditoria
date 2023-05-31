@extends('plantilla.plantilla')

@section('encabezado')
    Registro de conexiones de base de datos
@endsection

@section('titulo')
    Registro de conexiones de base de datos
@endsection


@section('contenido')
<div>


{{-- Alertas --}}

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<div class="card">

  
    
    @if ($conexiones->count()) 
        <div class="card-body">
            <table class="table table-striped" id="tabla">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                         <th scope="col">Usuario</th>
                        <th scope="col">Host</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conexiones as $actividad)
                    <tr>
                        <th scope="row">{{$actividad->id}}</th>
                        <td>{{$actividad->fecha_hora}}</td>
                        <td>{{$actividad->usuario}}</td>
                        <td>{{$actividad->host}}</td>
                        
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    
        
    
    
    @else
        
        <div class="card-body">
            <strong>No se encontraron actividades de conexiones</strong>
        </div>
    
    @endif

</div>


</div>



@endsection

@section('scripts')
    <script>
        Livewire.on('showSuccessAlert', function () {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Reporte enviado',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
@endsection


