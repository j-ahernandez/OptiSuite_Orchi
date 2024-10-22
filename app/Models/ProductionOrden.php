<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ProductionOrden extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    // Dejar $guarded vacío significa que todos los campos son asignables en masa
    protected $guarded = [];

    // Definir la relación con el modelo Status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function descriptionPart()
    {
        return $this->belongsTo(DescriptionPart::class, 'idDescriptionParts');
    }
}
