<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Molde extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    // Especifica los campos que se pueden rellenar masivamente
    protected $fillable = [
        'posicion',
    ];
}
