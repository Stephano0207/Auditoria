@extends('layout-cart.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
          
                  
                    <button class="switch" id="switch">
                        <span> <i class="fas fa-sun"></i></span>
                        <span><i class="fas fa-moon"></i> </span>
    
                   </button>
                    
                
                
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Productos</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="/images/{{ $pro->image }}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ $pro->image }}"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->nombre }}</h6></a>
                                    <p><b>Stock: </b>  {{ $pro->stock }}</p>
                                    <p><b>Precio:</b>  ${{ $pro->precio }}</p>

                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->idProducto }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->nombre }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->precio }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->image }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->detalle }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> agregar al carrito
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


