<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class BujeRBResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\BujeRB::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make('bujeRBNum')
                    ->title('Numero Parte Buje')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
                Input::make('dia_cpo_PI')
                    ->title('Descripcion del Dia CPO PI')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
            ]),
            Group::make([
                Input::make('long_cpo_PI')
                    ->title('Descripcion del Long CPO PI')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
                Input::make('long_tot_PI')
                    ->title('Descripcion del Long TOT PI')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
            ]),
            Group::make([
                Input::make('dian_int_PI')
                    ->title('Descripcion del Dian INT PI')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
                Input::make('dia_cpo_MM')
                    ->title('Descripcion del Dian CPO MM')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
            ]),
            Group::make([
                Input::make('long_cpo_MM')
                    ->title('Descripcion del Long CPO MM')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
                Input::make('long_tot_MM')
                    ->title('Descripcion del Long TOT MM')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
            ]),
            Group::make([
                Input::make('dian_int_MM')
                    ->title('Descripcion del Dian INT MM')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
                Input::make('remarks')
                    ->title('Descripcion del Remarks')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus(),
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
            /* TD::make('id'), */
            TD::make('bujeRBNum', 'Descripcion del No. Parte RB')
                ->sort()
                ->filter(Input::make()),
            TD::make('dia_cpo_PI', 'Descripcion del Dia CPO PI')
                ->sort()
                ->filter(Input::make()),
            TD::make('long_cpo_PI', 'Descripcion del Long CPO PI')
                ->sort()
                ->filter(Input::make()),
            TD::make('long_tot_PI', 'Descripcion del Long TOT PI')
                ->sort()
                ->filter(Input::make()),
            TD::make('dian_int_PI', 'Descripcion del Dian INT PI')
                ->sort()
                ->filter(Input::make()),
            TD::make('dia_cpo_MM', 'Descripcion del Dian CPO MM')
                ->sort()
                ->filter(Input::make()),
            TD::make('long_cpo_MM', 'Descripcion del Long CPO MMs')
                ->sort()
                ->filter(Input::make()),
            TD::make('long_tot_MM', 'Descripcion del Long TOT MM')
                ->sort()
                ->filter(Input::make()),
            TD::make('dian_int_MM', 'Descripcion del Dian INT MM')
                ->sort()
                ->filter(Input::make()),
            TD::make('remarks', 'Descripcion del Remarks')
                ->sort()
                ->filter(Input::make()),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            TD::make('updated_at', 'Update date')
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
            Sight::make('bujeRBNum')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('dia_cpo_PI')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('long_cpo_PI')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('long_tot_PI')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('dian_int_PI')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('dia_cpo_MM')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('long_cpo_MM')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('long_tot_MM')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('dian_int_MM')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('remarks')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('created_at', 'Fecha de creación')
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
