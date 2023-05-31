<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\evento_sesion;

class ActividadController extends Controller
{
   
    public function index(){
     
        return view('auditoria.actividad');
    }

   

   

    public function conexion_base_datos(){
        $conexiones=evento_sesion::all();
        return view('auditoria.actividad_base',compact('conexiones'));
    }



    
}
