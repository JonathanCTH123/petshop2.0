<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAnimal extends Model
{
    protected $table = 'tbl_animal';

    protected $fillable = [
        'nombre',
        'id_tipo_animal',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tbl-animals/'.$this->getKey());
    }

    public function TipoAnimal() {
        return $this->belongsTo(TblTipoAnimal::class, 'id_tipo_animal');
    }
}
