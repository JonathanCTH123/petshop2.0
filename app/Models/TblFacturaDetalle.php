<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblFacturaDetalle extends Model
{
    protected $table = 'tbl_factura_detalle';

    protected $fillable = [
        'id_factura',
        'id_articulo',
        'cantidad',
        'precio_unitario',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tbl-factura-detalles/'.$this->getKey());
    }
}
