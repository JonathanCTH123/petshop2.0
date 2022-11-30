<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class TblCliente extends Model implements HasMedia
{
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

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


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('imagen_cliente')
             ->accepts('image/*');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('imagen_cliente_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('imagen_cliente');
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tbl-clientes/'.$this->getKey());
    }
}
