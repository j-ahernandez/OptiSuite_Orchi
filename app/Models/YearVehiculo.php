<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class YearVehiculo extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    // Especifica los campos que se pueden rellenar masivamente
    protected $fillable = [
        'year_vh',
    ];
}