<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class MaterialConstVehiculo extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'no_mat',
        'width_plg',
        'thick_plg',
        'width_mm',
        'thick_mm',
        'Grueso',
        'material_combinado',           
    ];
}