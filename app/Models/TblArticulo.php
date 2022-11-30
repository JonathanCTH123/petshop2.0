<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblArticulo extends Model
{
    protected $table = 'tbl_articulo';

    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
        'estado',
        'id_animal',
        'id_proveedor',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tbl-articulos/'.$this->getKey());
    }
}
