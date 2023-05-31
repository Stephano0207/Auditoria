<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use Illuminate\Support\Collection;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Marca;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class BackupController extends Controller
{
   public function index(){
    
    return view('auditoria.backup');
   }

   public function store(Request $request){

     //mysqldump -u user -p exampledb > respaldo_exampledb.sql
        
        //Datos para ingresar a mysql
        $usuario=$request->usuario;
        if($request->contra==null){
          $contra="";
        }else{
          $contra=$request->contra;
        }
        
        $host="localhost";
        $base_datos="cuae";
        $n=$request->nombre_respaldo;
        $ip= $request->ip();
        

          $ruta= public_path('respaldos');  //ruta donde se guardarán los respaldos de la base de datos
      if (!file_exists($ruta)) {  //crea la carpeta 'respaldos' si no existe
          mkdir($ruta, 0777, true);
      }

      
        //fecha de creacion actual   
       //fecha
       $fecha=date("dmY_his");

        //Nombre del archivo
        $nombre_respaldo=$n.'_'.$fecha.'.sql';
      
        $rutaAbs="$ruta\\$nombre_respaldo";
     
        //Ejecuta y cambia 
        //c:/xampp/mysql/bin/mysqldump -hlocalhost -uroot -p --opt cuae >respaldo.sql
        //Comando 
        $comandosql="c:/xampp/mysql/bin/mysqldump -h$host -u$usuario --opt $base_datos > $ruta\\$nombre_respaldo";

        //return $comandosql;
        //Ejecuta comando sql en cmd
        system($comandosql);
        //return $rutaAbs;
        $this->registrarActividad("Backup creado","Regular", $rutaAbs,"$ip");
       
        return redirect()->route('administracion.index')
        ->with('success','Backup realizado con exito!');

        //opcional para crear en un archivo zip
       

   }

   public function list(){
    
    $actividades=Actividad::all()->where("accion","LIKE",'%Backup');
    return $actividades;
  }


   public function restore(){

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


}
