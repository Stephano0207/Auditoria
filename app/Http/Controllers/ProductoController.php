<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Actividad;
use App\Models\Marca;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $productos = (new Collection($productos1))->paginate(4);
        return view('producto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 

$marcas= Marca::all();
$categorias = Categoria::all();

        return view('producto.create',compact('categorias','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request-> validate([
        'nombre' => 'required' ,
        'detalle' => 'required',
        'precio' => 'required' ,
        'costo_envio' =>'required',
        'idCategoria' => 'required',
        'idMarca' => 'required',
        'image' => 'required|image',
        'stock' => 'required'
        ]);

       $ip= $request->ip();
        
        
        $producto = $request->all();
        if($imagen = $request->file('image')){
            $rutaGuardarImg= 'images/';
            $imagenProducto= date('YmdHis'). "." . $imagen->getClientOriginalExtension();
          $imagen->move($rutaGuardarImg,$imagenProducto);
            $producto['image'] = "$imagenProducto";
        }

       
         //registro actividad
         $this->registrarActividad("Producto Creado","Regular",$producto['nombre'],"$ip");
        Producto::create($producto);

      

        return redirect()->route('producto.index')
        ->with('success', 'Producto creado con exito!!');
    }


    public function registrarActividad($accion,$categoria,$detalles,$i){
          //obteniendo usuario
        //$usuario=Auth::user()->name;  
        $usuario=Auth::user()->id; 

       //fechar y hora de API timezonedb
        //list($fecha_list,$hora_list)=$this->fechaHoraApi();

        //fecha y hora local
        list($fecha_list,$hora_list)=$this->fechaHoraLocal();


        //INSERTANDO EN LA TABLA REGISTRO_ACTIVIDAD
        $registro = new Actividad;
        $registro->idUser = $usuario;
        $registro->fecha = $fecha_list;
        $registro->hora = $hora_list;
        $registro->accion = $accion;
        $registro->categoria = $categoria;
        $registro->detalles = $detalles;
        $registro->ip=$i;
        $registro->save();
    }

     public function fechaHoraLocal(){
        $fechaCompleta = Carbon::now();
        $fecha= $fechaCompleta->format('Y-m-d');
        $hora=$fechaCompleta->format( 'H:i:s');
        return array($fecha,$hora);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto= Producto::find($id);
        $marcas= Marca::all();
        $categorias = Categoria::all();

        return view('producto.edit',compact('producto','categorias','marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        //
        $p = Producto::find($id);
        $ip=$request->ip();
        $request-> validate([
            'nombre' => 'required' ,'detalle' => 'required',
            'precio' => 'required' ,'costo_envio' =>'required',
            'idCategoria' => 'required','idMarca' => 'required',
          
          
            'stock' => 'required'
        ]);

     
        $producto = $request->all();
     
        if($imagen = $request->file('image')){
            $rutaGuardarImg= 'images/';
            $imagenProducto= date('YmdHis'). "." . $imagen->getClientOriginalExtension();
          $imagen->move($rutaGuardarImg,$imagenProducto);
            $producto['image'] = "$imagenProducto";
        }else{
            unset($producto['image']);

        }

        $p->update($producto);

        //registro de actividad
        $this->registrarActividad("Producto Actualizado","Regular",$p->nombre,"$ip");
       
        return redirect()->route('producto.index')
        ->with('success', 'Producto actualizado con exito!!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Producto $producto)
    {
        //
        
        // $producto->delete();
        $ip=$request->ip();
        
        //registro de actividad
       
      
        $data = [
            'name' => Auth::user()->name,
            'nombreProducto' => $producto->nombre,
            'detalleProducto' => $producto->detalle,
            'precioProducto' => $producto->precio,
            'image' => $producto->image,
            'accion'=>"eliminar producto",
            'fecha'=>Carbon::now()->format('Y-m-d'),
            'hora'=> Carbon::now('America/Lima')->toTimeString(),
        ];
        
        //castanedastephano16@gmail.com
        // Mail::to('ldalval@unitru.edu.pe')
        // ->send(new TestMail($data));
        
        $producto->delete();
        $this->registrarActividad("Producto Eliminado","Regular",$producto->nombre,"$ip");
        
         return redirect()->route('producto.index')
         ->with('success', 'Producto eliminado con exito!!');
        // return json_encode(["msg" => "Producto eliminado con éxito"]);
    }
}
