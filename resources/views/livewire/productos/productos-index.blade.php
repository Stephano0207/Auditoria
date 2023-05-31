<div>
  

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<a href="{{route('producto.create')}}"> <button type="submit" class="btn btn-success"  value="REGISTRAR">REGISTRAR PRODUCTO</button></a>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"/>
<br><br>

<div class="card">
    <div class="card-header">
        <input wire:model="search"  class="form-control" placeholder="Ingrese el nombre,marca o categoría del producto a buscar">
    </div>

@if ($productos->count()) 
    <div class="card-body">
      <table class="table table-striped" id="tabla">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Detalle</th>
        <th scope="col">Precio</th>
        <th scope="col">Costo_Envío</th>
        <th scope="col">Categoría</th>
        <th scope="col">Marca</th>
        <th scope="col">Stock</th>
        <th scope="col">Accion</th>
        <th scope="col">Imagen</th>
        <th></th>
        
        </tr>
        </thead>
        <tbody>
        @foreach ($productos as $producto)
        <tr>
        <th scope="row">{{$producto->idProducto}}</th>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->detalle}}</td>
        <td>{{$producto->precio}}</td>
        <td>{{$producto->costo_envio}}</td>
        <td>{{$producto->categoria}}</td>
        <td>{{$producto->marca}}</td>
        <td>{{$producto->stock}}</td>
        <td>
        <form class="formEliminar" action="{{ route('producto.destroy',$producto->idProducto) }}" method="POST">
        <a class="btn btn-sm btn-primary" href="{{ route('producto.edit',$producto->idProducto) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
        </form>
        </td>
        
        <td><img style="width: 129px" class="img-fluid" src="/images/{{$producto->image}}" alt=""></td>
        
        
        
        </tr>
        
        
        
        @endforeach
        </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $productos->links() }}
    </div>


@else
    

    <div class="card-body">
        <strong>No se encontraron productos</strong>
    </div>
 

@endif

<script>



    (function () {
    'use strict'
    
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.formEliminar')
    
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
    .forEach(function (form) {
    form.addEventListener('submit', function (event) {
    
    event.preventDefault()
    event.stopPropagation()


 


    
    //confirmar delete
    Swal.fire({
    title: 'Está seguro de eliminar el producto?',
    text: "No podrá revertir esta acción!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, deseo eliminar el producto!'
    }).then((result) => {
    if (result.isConfirmed) {  //delete confirmado
    this.submit();
    Swal.fire(
    'Eliminado!',
    'El producto se eliminó correctamente',
    'success'
    )

    
    
    }
    })
    
    
    }, false)
    })
    })()
    </script>











</div>






</div>
