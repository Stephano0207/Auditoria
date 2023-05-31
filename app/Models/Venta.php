<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

     protected $table=  'venta';
    protected $fillable= ['idVenta','fechaVenta','estadoPedido','id'];
    public $primaryKey= 'idVenta';
    public $timestamps = false;
    use HasFactory;
}
