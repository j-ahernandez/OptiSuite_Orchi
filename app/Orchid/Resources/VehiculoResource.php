<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\Fields\Group;

class VehiculoResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Vehiculo::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make('descripcionvehiculo')
                    ->title('Descripción del Vehículo')
                    ->placeholder('Ingrese la descripción del vehículo')
                    ->autofocus()
                    ->required(),

                Input::make('nombrecorto')
                    ->title('Nombre Corto')
                    ->placeholder('Ingrese el nombre corto del vehículo')
                    ->required(),

                Input::make('numero')
                    ->title('Número')
                    ->placeholder('Ingrese el número')
                    ->required(),                           
            ]),           
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id')
                ->sort()
                ->filter(Input::make()),

            TD::make('descripcionvehiculo', 'Descripción del Vehículo')
                ->sort()
                ->filter(Input::make()),   
                
            TD::make('nombrecorto' , 'Nombre Corto')
                ->sort()
                ->filter(Input::make()),                 
                
            TD::make('numero' , 'Número')
                ->sort()
                ->filter(Input::make()),                 

            TD::make('created_at', 'Fecha de creación', )
                ->sort()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Fecha de actualización')
                ->sort()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('descripcionvehiculo', 'Descripción del Vehículo'),
            Sight::make('nombrecorto', 'Nombre corto'),
            Sight::make('numero', title: 'Número'),
            Sight::make('created_at', 'Fecha de actualización')
            ->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('updated_at', 'Fecha de actualización')
            ->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}