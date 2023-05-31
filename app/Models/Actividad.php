<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Actividad;

class Actividad extends Model
{
    
    protected $table=  'registro_actividad';
    protected $fillable=['id','idUser','fecha','accion','categoria','detalles','ip'];
    public $primaryKey= 'id';
    public $timestamps = false; 
    use HasFactory;

    public function usuario(){
        return $this->hasOne(User::class,'id','idUser');
    }
}
