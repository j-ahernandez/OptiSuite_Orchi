<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class ModeloVehiculo extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'modelo_vehiculos',
        'idVehiculo',
    ];
    
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'idVehiculo', 'id');
    }
}