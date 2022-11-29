<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblTipoAnimal extends Model
{
    protected $table = 'tbl_tipo_animal';

    protected $fillable = [
        'id',
        'nombre',
        'habilitado',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tbl-tipo-animals/' . $this->getKey());
    }
}
