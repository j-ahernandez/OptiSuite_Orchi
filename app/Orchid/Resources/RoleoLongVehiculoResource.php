<?php

namespace App\Orchid\Resources;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Group;

class RoleoLongVehiculoResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\RoleoLongVehiculo::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [ 
            Group::make([
                Input::make('milimetros')
                    ->title('Milimetros')
                    ->type('text')
                    ->placeholder('Ingrese los Milimetros')
                    ->autofocus()
                    ->required(),

                Input::make('pulgadas')
                    ->title('Pulgadas')
                    ->type('text')
                    ->placeholder('Ingrese las Pulgadas')
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

            TD::make('milimetros', 'Milemetros')
            ->sort()
            ->filter(Input::make()),
            
            TD::make('pulgadas', 'Pulgadas')
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
            Sight::make('milimetros', 'Milemetros'),
            Sight::make('pulgadas', 'Pulgadas'),
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