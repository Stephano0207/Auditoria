@extends('plantilla.plantilla')
@section('encabezado')
   Creación de backup
@endsection
@section('css')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection
@section('titulo')
    Creacion de backup
@endsection

@section('contenido')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="container">
    <form  action="{{route('administracion.backup')}}" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="mb-3">
           
            <input type="text" placeholder="Nombre del backup" name="nombre_respaldo" class="form-control" id="a" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <hr>
        
        <div class="mb-3">
           
            <input type="text" placeholder="Usuario" name="usuario" class="form-control" id="a" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <hr>
        <br>
        <div class="mb-3">
         
            <input placeholder="Contraseña"  name="contra" class="form-control" >
            <div id="emailHelp" class="form-text"></div>
        </div>
<hr>



       
<hr>
         
  


       


    
            
        
  




          <br>
        <button type="submit" class="btn btn-primary">Realizar backup</button>
      <button type="button" class="btn btn-warning"><a href="{{url('producto/')}}" style="color: black;">REGRESAR </a></button>
      </form>

    </div>

  <br>


     @endsection

@section('js')
            
<script>
    $(document).ready(function (e) {
        $('#formFile').change(function(){
            let reader= new FileReader();
            reader.onload =(e) =>{
                $('#imagenSeleccionada').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    });

    
</script>
@endsection

