<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class BujeLCResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\BujeLC::class;

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        // Este método define el nombre que aparecerá en el menú para este recurso.
        return __('Buje LC');
    }

    /**
     * Get the title for the resource.
     *
     * @return string
     */
    public function title(): string
    {
        // Este método define el título que se mostrará en la vista de detalles del recurso.
        return __('Buje LC');
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
                Input::make('part_no')
                    ->title('Part_No')
                    ->type('text')  // Corregido
                    ->autofocus()
                    ->required(),
                Input::make('od_a')
                    ->title('OD_A')
                    ->type('text')  // Corregido
                    ->required(),
                Input::make('id_b')
                    ->title('ID_B')
                    ->type('text')  // Corregido
                    ->required(),
            ]),
            Group::make([
                Input::make('length_c')
                    ->title('Length C')
                    ->type('text')  // Corregido
                    ->required(),
                Input::make('picture')
                    ->title('Picture')
                    ->type('numeric')  // Corregido
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
            TD::make('id'),
            TD::make('part_no', 'Part_No')
                ->sort()
                ->filter(Input::make()),
            TD::make('od_a', 'OD_A')
                ->sort()
                ->filter(Input::make()),
            TD::make('id_b', 'ID_B')
                ->sort()
                ->filter(Input::make()),
            TD::make('length_c', 'Length C')
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
            Sight::make('part_no'),
            Sight::make('od_a'),
            Sight::make('id_b'),
            Sight::make('length_c'),
            Sight::make('created_at', 'Fecha de creación')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            Sight::make('updated_at', 'Fecha de actualización')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();  // Cambiado `created_at` por `updated_at`
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