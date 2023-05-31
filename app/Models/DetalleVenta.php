<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table=  'detalleventa';
    protected $fillable= ['idDetalleVenta','idVenta','idProducto','cantidad'];
    public $primaryKey= 'idDetalleVenta';
    public $timestamps = false;
    use HasFactory;
}
