<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubicacion_origen',
        'ubicacion_destino',
        'oferta',
        'user_id',
        'estado',
        'driver_name',
        'driver_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
