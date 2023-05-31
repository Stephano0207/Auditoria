<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evento_sesion extends Model
{
    protected $table=  'evento_sesion_base_datos';
    protected $fillable=['fecha_hora','host','usuario'];
    public $primaryKey= 'id';
    public $timestamps = false; 
    use HasFactory;
}
