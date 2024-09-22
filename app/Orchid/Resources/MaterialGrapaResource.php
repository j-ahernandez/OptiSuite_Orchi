<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class MaterialGrapaResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\MaterialGrapa::class;

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        // Este método define el nombre que aparecerá en el menú para este recurso.
        return __('Material Grapa');
    }

    /**
     * Get the title for the resource.
     *
     * @return string
     */
    public function title(): string
    {
        // Este método define el título que se mostrará en la vista de detalles del recurso.
        return __('Material Grapa');
    }

    /**
     * Get the icon for the resource.
     *
     * @return string
     */
    public static function icon(): string
    {
        // Este método define el icono que se usará en el menú para este recurso.
        // Aquí estamos usando un icono de Font Awesome.
        return 'fa.book';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make('inches')
                    ->title('Detalle de Pulgadas')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->autofocus()
                    ->required(),
                Input::make('decimal')
                    ->title('Decimal')
                    ->type(value: 'text')  // Definir que el campo es numérico
                    ->required(),
                Input::make('mm')
                    ->title('Descripcion de MM')
                    ->type(value: 'text')  // Definir que el campo es numérico
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
            /* TD::make('id'), */
            TD::make('inches', 'Detalle de Pulgadas')
                ->sort()
                ->filter(Input::make()),
            TD::make('decimal', 'Decimal')
                ->sort()
                ->filter(Input::make()),
            TD::make('mm', 'Descripcion de MM')
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
            Sight::make('inches'),
            Sight::make('decimal'),
            Sight::make('mm'),
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
