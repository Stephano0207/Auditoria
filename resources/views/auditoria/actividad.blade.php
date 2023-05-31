@extends('plantilla.plantilla')

@section('encabezado')
    Registro de Actividad
@endsection

@section('titulo')
    Registro de Actividad
@endsection


@section('contenido')
  @livewire('actividad.actividades')

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


