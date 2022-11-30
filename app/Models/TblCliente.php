<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblCliente extends Model
{
    protected $table = 'tbl_cliente';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dui',
        'fecha_nacimiento',
        'img',
    
    ];
    
    
    protected $dates = [
        'fecha_nacimiento',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tbl-clientes/'.$this->getKey());
    }
}
