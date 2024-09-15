<?php

namespace App\Orchid\Resources;

use Illuminate\Validation\Rule;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class MaterialConstVehiculoResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\MaterialConstVehiculo::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make('no_mat')
                    ->title('Número de materia prima')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->placeholder('Ingrese el número de la materia prima')
                    ->autofocus()
                    ->required(),
                Input::make('width_plg')
                    ->title('Ancho en plg')
                    ->placeholder('Ingrese Ancho en plg')
                    ->required(),
                Input::make('thick_plg')
                    ->title('Espesor en mm plg')
                    ->placeholder('Ingrese el Espesor en mm plg')
                    ->required(),
            ]),
            Group::make([
                Input::make('width_mm')
                    ->title('Anchoi en mm')
                    ->placeholder('Ingrese el ancho en mm')
                    ->required(),
                Input::make('thick_mm')
                    ->title('Espesor en mm')
                    ->placeholder('Ingrese el Espesor en mm')
                    ->required(),
                Input::make('Grueso')
                    ->title('Grueso')
                    ->placeholder('Ingrese el grueso de la pieza')
                    ->required(),
            ]),
            Group::make([
                Input::make('material_combinado')
                    ->title('Material combinado')
                    ->placeholder('Ingrese el Material combinado')
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
            TD::make('id')
                ->sort()
                ->filter(Input::make()),
            TD::make('no_mat', 'Número de materia prima')
                ->sort()
                ->filter(Input::make()),
            TD::make('width_plg', 'Ancho en plg')
                ->sort()
                ->filter(Input::make()),
            TD::make('thick_plg', 'Espesor en plg')
                ->sort()
                ->filter(Input::make()),
            TD::make('width_mm', 'Ancho en mm')
                ->sort()
                ->filter(Input::make()),
            TD::make('thick_mm', 'Espesor en mm')
                ->sort()
                ->filter(Input::make()),
            TD::make('Grueso', 'Grueso de la pieza')
                ->sort()
                ->filter(Input::make()),
            TD::make('material_combinado', 'Material Cobinado')
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
            Sight::make('no_mat', 'Número de materia prima'),
            Sight::make('width_plg', 'Ancho en plg'),
            Sight::make('thick_plg', 'Espesor en plg'),
            Sight::make('width_mm', 'Ancho en mm'),
            Sight::make('thick_mm', 'Espesor en mm'),
            Sight::make('Grueso', 'Grueso de la pieza'),
            Sight::make('material_combinado', 'Material combinado'),
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
