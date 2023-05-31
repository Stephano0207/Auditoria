@extends('plantilla.plantilla')
@section('encabezado')
   Registrar Producto
@endsection
@section('css')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection
@section('titulo')
    Registrar Producto
@endsection

@section('contenido')
        
<div class="container">
    <form  action="{{route('producto.store')}}" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="mb-3">
           
            <input type="text" placeholder="NOMBRE DEL PRODUCTO" name="nombre" class="form-control" id="a" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <hr>
        
        <div class="form-floating">
            <textarea class="form-control" name="detalle" placeholder="D" id="a"></textarea>
            <label style="font-weight: normal;" for="floatingTextarea">DESCRIBIR EL PRODUCTO</label>
        </div>
        <hr>
        <br>
        <div class="mb-3">
         
            <input placeholder="PRECIO" type="number" name="precio" class="form-control" id="a" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
<hr>
<div class="mb-3">
         
    <input placeholder="COSTO DE ENVIO" type="number" name="costo_envio" class="form-control" id="a" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
</div>
<hr>


        <label for="exampleInputEmail1" class="form-label">CATEGORIA: </label>
         
        <select class="form-select" name="idCategoria" aria-label="Default select example" >
            @foreach ($categorias as $categoria)

        
        <option value="{{$categoria['idCategoria']}}">

            

         {{$categoria['categoria']}}
         </option>
       @endforeach   
          </select>
<hr>
          <label for="exampleInputEmail1" class="form-label">MARCA: </label>
         
          <select class="form-select" name="idMarca" aria-label="Default select example" >
              @foreach ($marcas as $marca)
  
          
          <option value="{{$marca['idMarca']}}">
  
              
  
           {{$marca['marca']}}
           </option>
         @endforeach   
            </select>
  

   <hr>

 <br>
        <div class="mb-3">
         
          <input placeholder="STOCK" type="number" name="stock" class="form-control" id="a" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text"></div>
        </div>

<hr>


       
<div class="card justify-content-center" style="width: 18rem;" id="img">
    <img src="" class="img-fluid" id="imagenSeleccionada"  style="max-height: 300px" alt="">
    <div class="card-body">
      <h5 class="card-title">Vista Previa</h5>
      
    </div>
  </div>


         
        <div>
                <label for="formFile" class="form-label">Selecionar imagen</label>
                <input class="form-control" id="formFile" name="image" type="file">
        </div>
            
        
  




          <br>
        <button type="submit" class="btn btn-primary">REGISTRAR PRODUCTO</button>
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

