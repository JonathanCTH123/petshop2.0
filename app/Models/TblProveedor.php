<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblProveedor extends Model
{
    protected $table = 'tbl_proveedor';

    protected $fillable = [
        'nombre',
        'fecha',
        'estado',
    
    ];
    
    
    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tbl-proveedors/'.$this->getKey());
    }
}
