@extends('plantilla.plantilla')

@section('encabezado')
    Registro de Backup
@endsection

@section('titulo')
    Registro de Backup
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

             <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <input wire:model="search" class="form-control" placeholder="Buscar por fecha, acción o categoría">
                    </div>
                    <div>
                        <button wire:click="generarReporte" class="btn btn-primary">Generar Reporte por Email</button>
                    </div>
                </div>
            </div>
        
        @if ($actividades->count()) 
            <div class="card-body">
                <table class="table table-striped" id="tabla">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                             <th scope="col">IP</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Detalles</th>
                            <th scope="col">Acción</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actividades as $actividad)
                        @if ($actividad->accion=="Backup creado")
                        <tr>
                            <th scope="row">{{$actividad->id}}</th>
                            <td>{{$actividad->fecha}}</td>
                            <td>{{$actividad->ip}}</td>
                            <td>{{$actividad->hora}}</td>
                            <td>{{$actividad->detalles}}</td>
                            <td> 
                                <form action="{{ route('administracion.restore',$actividad->id) }}" method="GET">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Restaurar</button>
                                </form> </td>
                            
                        </tr>  
                        @endif
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        
           
        
        
        @else
            
            <div class="card-body">
                <strong>No se encontraron actividades</strong>
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


