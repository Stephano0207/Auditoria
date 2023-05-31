<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table=  'categorias';
    protected $fillable= ['idCategoria','categoria'];
    public $primaryKey= 'idCategoria';
    public $timestamps = false;
    use HasFactory;
}
