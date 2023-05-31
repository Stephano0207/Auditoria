<?php

namespace App\Http\Controllers;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use PDF;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cantidadProductosComprados= \Cart::getTotalQuantity();   
        
    $x=0;
    
    if($cantidadProductosComprados>0){
        foreach(\Cart::getContent() as $item) {

             $producto= DB::table('productos')->where('productos.idProducto', '=', $item->id)->first();
          
            if($item->quantity > $producto->stock){
                     //no alcanza el stock
                     $x=$x+1;    
                     $obj=$producto->nombre;
            }
        }

        if ($x>0) {
           $cartCollection=\Cart::getContent();
            return redirect()->route('cart.index')->with('info','STOCK INSUFICIENTE: '.$obj)->with(['cartCollection' => $cartCollection]);
         
        }else{

//venta


                 $venta = new Venta();

                $fechaRegistro=  Carbon::now();
                $fechaRegistro->format('Y-m-d');
                $venta->fechaVenta= $fechaRegistro;
    

                $venta->estadoPedido="comprado";
                 $venta->id= Auth::user()->id;
                $venta ->save();




                //
                //detalle de venta...
            //obtenemos la venta reciente registrada en venta
             $idVentaReciente= Venta::latest('idVenta')->first();
            
             
                 
             foreach(\Cart::getContent() as $item) {
                $product= DB::table('productos')->where('productos.idProducto', '=', $item->id)->first();
                $nuevo_stock= $product->stock - $item->quantity;

                DB::table('productos')
                ->where('idProducto', $item->id)
                ->update(['stock' => $nuevo_stock]);

     
                  $detalleventa = new DetalleVenta();
                  $detalleventa->idVenta = $idVentaReciente->idVenta;
                  $detalleventa->idProducto= $item->id;
                  $detalleventa->cantidad = $item->quantity;
 
                  $detalleventa->save();
             };


    
//pdf

$datos= DB::select('call detalleventa (?)', array($idVentaReciente->idVenta));
$total= DB::select('call totalVenta (?)', array($idVentaReciente->idVenta));


     $data = [
        'title' => 'Estrella´s',
        'date' => date('m/d/Y'),
        'datos' => $datos,
        'total' => $total
    ]; 
        
    \Cart::clear();
    $pdf = PDF::loadView('venta.pdf', $data);
 
  return   $pdf->download('venta'.Auth::user()->name.$fechaRegistro.'.pdf');

  return redirect()->route('tienda');
        }

          
       
    }else{
        $cartCollection=\Cart::getContent();
        return redirect()->route('cart.index')->with('info','CARRITO VACIO!!: '.$obj)->with(['cartCollection' => $cartCollection]);
     
    }
 
            

       

             
        }
       
         



        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request){
       


    

       
         $name = $request->input('name');
         $surname = $request->input('surname');
         $message = "tu nombre es ".$name."y tu apellido es ".$surname."";
         echo json_encode(compact('message'));


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
