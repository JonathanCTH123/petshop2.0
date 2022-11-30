<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblFactura extends Model
{
    protected $table = 'tbl_factura';

    protected $fillable = [
        'id_cliente',
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
        return url('/admin/tbl-facturas/'.$this->getKey());
    }
}
