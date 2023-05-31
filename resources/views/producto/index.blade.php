@extends('plantilla.plantilla')
@section('encabezado')
    Listado Productos
@endsection

@section('titulo')
    Productos
@endsection
@section('contenido')



    @livewire('productos.productos-index')

@endsection