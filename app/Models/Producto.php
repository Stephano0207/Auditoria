<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table=  'productos';
    protected $fillable= ['idProducto','nombre','detalle','precio','costo_envio','idCategoria','idMarca','image','stock'];
    public $primaryKey= 'idProducto';
    public $timestamps = false;
    use HasFactory;
}
