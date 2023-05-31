<?php

namespace App\Http\Livewire\Productos;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Producto;

class ProductosIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme= "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $productos=Producto::select('idProducto','nombre','detalle','precio','costo_envio','categoria','marca'
        ,'stock','image')
        ->join('categorias','categorias.idCategoria','=','productos.idCategoria')
        ->join('marcas','marcas.idMarca','=','productos.idMarca')
        ->where('productos.nombre','LIKE','%'.$this->search.'%')
        ->orwhere('marcas.marca','LIKE','%'.$this->search.'%')
        ->orwhere('categorias.categoria','LIKE','%'.$this->search.'%')
        ->orderBy('productos.idProducto','ASC')->paginate(5);
       
      
        return view('livewire.productos.productos-index',compact('productos'));
    }
    
}
