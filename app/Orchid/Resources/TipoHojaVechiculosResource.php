<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;

class TipoHojaVechiculosResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\TipoHojaVechiculos::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('tipo_hoja')
            ->title('Tipo Hoja')
            ->placeholder('Ingrese el tipo de la hoja')
            ->autofocus()
            ->required(),           
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

            TD::make('tipo_hoja', 'Tipo de Hoja')
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
            Sight::make('tipo_hoja', 'Tipo la hoja'),
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