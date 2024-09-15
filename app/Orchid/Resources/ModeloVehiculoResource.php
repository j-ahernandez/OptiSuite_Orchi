<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Group;

class ModeloVehiculoResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ModeloVehiculo::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Select::make('idVehiculo')
                    ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Vehículo')
                    ->help('Permite buscar vehículos')
                    ->empty('') // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"

                Input::make('modelo_detalle')
                    ->title('Modelo')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->placeholder('Ingrese el modelo del vehículo')
                    ->required()                              
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

            TD::make('vehiculo.descripcionvehiculo', 'Nombre del Vehículo')
                ->sort()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->vehiculo ? $model->vehiculo->descripcionvehiculo : 'N/A';
                }),                    

            TD::make('vehiculo.descripcionvehiculo', 'Nombre del Vehículo')
                ->sort()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->vehiculo->descripcionvehiculo;
                }),                

            TD::make('modelo_detalle')
                ->sort()
                ->filter(Input::make()),                

            TD::make('created_at', 'Fecha de creación')
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
            Sight::make('vehiculo.descripcionvehiculo', 'Nombre del Vehículo')
            ->render(function ($model) {
                return $model->vehiculo ? $model->vehiculo->descripcionvehiculo : 'N/A';
            }),
            Sight::make('modelo_detalle', 'Modelo'),
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