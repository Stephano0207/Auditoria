<?php

namespace App\Http\Livewire\Actividad;

use App\Models\Actividad;
use Livewire\WithPagination;  //importamos la paginación de Livewire
use Livewire\Component;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class Actividades extends Component
{
    use WithPagination; //usamos la paginación
    public $search;     //creamos una variable que almacenará las busquedas que realizemos
    protected $paginationTheme= "bootstrap"; //usaremos bootstrap para los estilos

    public function updatingSearch(){  //esta función reiniciará la paginación a 1 cada vez que realizemos una búsqueda
        $this->resetPage();
    }


    public function render() //esta función es la principal y actúa como controlador enviando parametros a las vistas
    {

       

        $actividades = Actividad::join('users','registro_actividad.idUser','=','users.id')
        ->where('registro_actividad.fecha','LIKE','%'.$this->search.'%')
        ->orwhere('registro_actividad.accion','LIKE','%'.$this->search.'%')
        ->orwhere('registro_actividad.categoria','LIKE','%'.$this->search.'%')
        ->select('registro_actividad.id as id','users.name as name','registro_actividad.fecha as fecha'
        ,'registro_actividad.hora as hora','registro_actividad.accion as accion'
        ,'registro_actividad.categoria as categoria','registro_actividad.detalles as detalles','registro_actividad.ip as ip')
        ->orderBy('registro_actividad.id', 'asc')
        ->paginate(7);


        
        return view('livewire.actividad.actividades',compact('actividades'));
    }


    public function generarReporte()
    {
       
    //alerta sweet   
    $this->emit('showSuccessAlert');


    // Lógica para generar el reporte y enviarlo por correo
    // ...

    $actividades = Actividad::join('users','registro_actividad.idUser','=','users.id')
    ->where('registro_actividad.fecha','LIKE','%'.$this->search.'%')
    ->orwhere('registro_actividad.accion','LIKE','%'.$this->search.'%')
    ->orwhere('registro_actividad.categoria','LIKE','%'.$this->search.'%')
    ->select('registro_actividad.id as id','users.name as name','registro_actividad.fecha as fecha'
    ,'registro_actividad.hora as hora','registro_actividad.accion as accion'
    ,'registro_actividad.categoria as categoria','registro_actividad.detalles as detalles')
    ->orderBy('registro_actividad.id', 'asc')->get();

    $data = [
        'actividades' => $actividades->toArray(), 
    ];


    //enviando correo
    Mail::to('ldalval@unitru.edu.pe')
    ->send(new TestMail($data));

    }
}
