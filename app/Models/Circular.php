<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circular extends Model
{
    protected $table = 'circulares';

    protected $fillable = [
        'nombre',
        'descripcion',
        'archivo',
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];
}
