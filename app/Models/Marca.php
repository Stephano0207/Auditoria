<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table=  'marcas';
    protected $fillable= ['idMarca','marca'];
    public $primaryKey= 'idMarca';
    public $timestamps = false;
    use HasFactory;
}
