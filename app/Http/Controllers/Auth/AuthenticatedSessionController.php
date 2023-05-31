<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Actividad;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $this->registrarActividad("Inicio de Sesión","Regular",$request->ip());
        
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function registrarActividad($accion,$categoria,$ip)
    {
        //obteniendo usuario
        //$usuario=Auth::user()->name;  
        $usuario=Auth::user()->id; 

       //fechar y hora de API timezonedb
        //list($fecha_list,$hora_list)=$this->fechaHoraApi();

        //fecha y hora local
        list($fecha_list,$hora_list)=$this->fechaHoraApi();


        //INSERTANDO EN LA TABLA REGISTRO_ACTIVIDAD
        $registro = new Actividad;
        $registro->idUser = $usuario;
        $registro->fecha = $fecha_list;
        $registro->hora = $hora_list;
        $registro->accion = $accion;
        $registro->categoria = $categoria;
        $registro->ip=$ip;
        $registro->save();

        // Mostrar la fecha y hora actual
        //dd($usuario,$fecha,$hora,$accion,$categoria);
    }

    public function fechaHoraApi(){
         //obteniendo fecha y hora de la API TIMEZONEDB
         $apiKey = 'B2HMF2D4OTGK'; // Reemplaza con tu propia clave de API
         $client = new Client();
         $response = $client->request('GET', "http://api.timezonedb.com/v2.1/get-time-zone?key=$apiKey&format=json&by=zone&zone=America/Lima");
         $timestamp = json_decode($response->getBody()->getContents())->timestamp;
         
         // Convertir la hora UTC a la hora local
         $currentDateTime = Carbon::createFromTimestamp($timestamp, 'UTC')
             ->addHours(5)
             ->setTimezone('America/Lima');
 
         $fecha= $currentDateTime->format('Y-m-d');
         $hora= $currentDateTime->format('H:i:s');

        return array($fecha, $hora);
    }

    public function fechaHoraLocal(){
        $fechaCompleta = Carbon::now();
        $fecha= $fechaCompleta->format('Y-m-d');
        $hora=$fechaCompleta->format( 'H:i:s');
        return array($fecha,$hora);
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $this->registrarActividad("Cierre de Sesión","Regular",$request->ip());
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        \Cart::clear();
        return redirect('/');
    }
}
