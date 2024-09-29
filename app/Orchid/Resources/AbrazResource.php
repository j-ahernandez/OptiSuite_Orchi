<?php

namespace App\Orchid\Resources;

use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class AbrazResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Abraz::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make('ANCHOmm')
                    ->title('ANCHOmm')
                    ->type('numeric')  // Corregido
                    ->autofocus()
                    ->required(),
                Input::make('GRUESOmm')
                    ->title('GRUESOmm')
                    ->type('numeric'),  // Corregido
                Input::make('ANCHOmm_Lookup')
                    ->title('ANCHOmm_Lookup')
                    ->type('numeric'),  // Corregido
            ]),
            Group::make([
                Input::make('GRUESOmm_Lookup')
                    ->title('GRUESOmm_Lookup C')
                    ->type('numeric'),
                Input::make('Pos2')
                    ->title('Pos2')
                    ->type('numeric'),  // Corregido
                Input::make('Pos3')
                    ->title('Pos3')
                    ->type('numeric'),  // Corregido
            ]),
            Group::make([
                Input::make('Pos4')
                    ->title('Pos4')
                    ->type('numeric'),
                Input::make('Pos5')
                    ->title('Pos5')
                    ->type('numeric'),  // Corregido
                Input::make('Pos6')
                    ->title('Pos6')
                    ->type('numeric'),  // Corregido
            ]),
            Group::make([
                Input::make('Pos7')
                    ->title('Pos7')
                    ->type('numeric'),
                Input::make('Pos8')
                    ->title('Pos8')
                    ->type('numeric'),  // Corregido
                Input::make('Pos9')
                    ->title('Pos9')
                    ->type('numeric'),  // Corregido
            ]),
            Group::make([
                Input::make('Pos10')
                    ->title('Pos10')
                    ->type('numeric'),
                Input::make('Pos11')
                    ->title('Pos11')
                    ->type('numeric'),  // Corregido
                Input::make('Pos12')
                    ->title('Pos12')
                    ->type('numeric'),  // Corregido
            ]),
            Group::make([
                Input::make('Pos13')
                    ->title('Pos13')
                    ->type('numeric'),
                Input::make('Pos14')
                    ->title('Pos14')
                    ->type('numeric'),  // Corregido
                Input::make('Pos15')
                    ->title('Pos15')
                    ->type('numeric'),  // Corregido
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
            TD::make('ANCHOmm', 'ANCHO mm')
                ->sort()
                ->filter(Input::make()),
            TD::make('GRUESOmm', 'GRUESO mm')
                ->sort()
                ->filter(Input::make()),
            TD::make('ANCHOmm_Lookup', 'ANCHO mm')
                ->sort()
                ->filter(Input::make()),
            TD::make('GRUESOmm_Lookup', '2 GRUESO mm')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos2', 'Pos 2')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos3', 'Pos 3')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos4', 'Pos 4')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos5', 'Pos 5')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos6', 'Pos 6')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos7', 'Pos 7')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos8', 'Pos 8')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos9', 'Pos 9')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos10', 'Pos 10')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos11', 'Pos 11')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos12', 'Pos 12')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos13', 'Pos 13')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos14', 'Pos 14')
                ->sort()
                ->filter(Input::make()),
            TD::make('Pos15', 'Pos 15')
                ->sort()
                ->filter(Input::make()),
            TD::make('created_at', 'Fecha de creación')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            TD::make('updated_at', 'Fecha de actualización')
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
            Sight::make('ANCHOmm'),
            Sight::make('GRUESOmm'),
            Sight::make('ANCHOmm_Lookup'),
            Sight::make('GRUESOmm_Lookup'),
            Sight::make('Pos2'),
            Sight::make('Pos3'),
            Sight::make('Pos4'),
            Sight::make('Pos5'),
            Sight::make('Pos6'),
            Sight::make('Pos7'),
            Sight::make('Pos8'),
            Sight::make('Pos8'),
            Sight::make('Pos9'),
            Sight::make('Pos10'),
            Sight::make('Pos11'),
            Sight::make('Pos12'),
            Sight::make('Pos13'),
            Sight::make('Pos14'),
            Sight::make('Pos15'),
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

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        // Este método define el nombre que aparecerá en el menú para este recurso.
        return __('Abrazaderas');
    }

    /**
     * Get the title for the resource.
     *
     * @return string
     */
    public function title(): string
    {
        // Este método define el título que se mostrará en la vista de detalles del recurso.
        return __('Abrazaderas');
    }

    /**
     * Get the singular name of the resource.
     *
     * @return string
     */
    public static function singular(): string
    {
        return __('Abrazadera');
    }

    /**
     * Get the plural name of the resource.
     *
     * @return string
     */
    public static function plural(): string
    {
        return __('Abrazaderas');
    }

    /**
     * Get the description of the resource.
     *
     * @return string
     */
    public static function description(): string
    {
        return __('Gestión de Abrazaderas');
    }

    /**
     * Get the text for the list breadcrumbs.
     *
     * @return string
     */
    public static function listBreadcrumbsMessage(): string
    {
        return static::label();
    }

    /**
     * Get the text for the create breadcrumbs.
     *
     * @return string
     */
    public static function createBreadcrumbsMessage(): string
    {
        return __('Nuevo :resource', ['resource' => static::singular()]);
    }

    /**
     * Get the text for the edit breadcrumbs.
     *
     * @return string
     */
    public static function editBreadcrumbsMessage(): string
    {
        return __('Editar :resource', ['resource' => static::singular()]);
    }

    /**
     * Get the text for the create resource button.
     *
     * @return string|null
     */
    public static function createButtonLabel(): string
    {
        return __('Crear :resource', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the create resource toast.
     *
     * @return string
     */
    public static function createToastMessage(): string
    {
        return __(':resource fue creado!', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the update resource button.
     *
     * @return string|null
     */
    public static function updateButtonLabel(): string
    {
        return __('Actualizar :resource', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the update resource toast.
     *
     * @return string
     */
    public static function updateToastMessage(): string
    {
        return __(':resource fue actualizado!', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the delete resource button.
     *
     * @return string|null
     */
    public static function deleteButtonLabel(): string
    {
        return __('Eliminar :resource', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the delete resource toast.
     *
     * @return string
     */
    public static function deleteToastMessage(): string
    {
        return __(':resource fue eliminado!', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the number of models to return per page
     *
     * @return int
     */
    public static function perPage(): int
    {
        return 30;
    }

    /**
     * Indicates whether should check for modifications
     * between viewing and updating a resource.
     *
     * @return bool
     */
    public static function trafficCop(): bool
    {
        return true;  // Habilita la verificación de cambios
    }

    /**
     * Get the validation rules that apply to save/update.
     *
     * @return array
     */
    public function rules(Model $model): array
    {
        return [
            'ANCHOmm' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',  // Regla de requerimiento y máximo de 5
            'GRUESOmm' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'ANCHOmm_Lookup' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'GRUESOmm_Lookup' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos2' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos3' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos4' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos5' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos6' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos7' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos8' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos9' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos10' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos11' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos12' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos13' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos14' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
            'Pos15' => 'numeric|regex:/^\d{1,16}(\.\d{1,2})?$/',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'ANCHOmm' => 'El Ancho mm solo permite dos caracteres despues del punto.',
            'GRUESOmm' => 'El Grueso mm solo permite dos caracteres despues del punto.',
            'ANCHOmm_Lookup' => 'El Ancho (mm) LL solo permite dos caracteres despues del punto.',
            'GRUESOmm_Lookup' => 'El Grueso (mm) LL solo permite dos caracteres despues del punto.',
            'Pos2' => 'El Paso 2 solo permite dos caracteres despues del punto.',
            'Pos3' => 'El Paso 3 de material solo permite dos caracteres despues del punto.',
            'Pos4' => 'El Paso 4 de material solo permite dos caracteres despues del punto.',
            'Pos5' => 'El Paso 5 de material solo permite dos caracteres despues del punto.',
            'Pos6' => 'El Paso 6 de material solo permite dos caracteres despues del punto.',
            'Pos7' => 'El Paso 7 de material solo permite dos caracteres despues del punto.',
            'Pos8' => 'El Paso 8 de material solo permite dos caracteres despues del punto.',
            'Pos9' => 'El Paso 9 de material solo permite dos caracteres despues del punto.',
            'Pos10' => 'El Paso 10 solo permite dos caracteres despues del punto.',
            'Pos11' => 'El Paso 11 solo permite dos caracteres despues del punto.',
            'Pos12' => 'El Paso 12 solo permite dos caracteres despues del punto.',
            'Pos13' => 'El Paso 13 solo permite dos caracteres despues del punto.',
            'Pos14' => 'El Paso 14 solo permite dos caracteres despues del punto.',
            'Pos15' => 'El Paso 15 solo permite dos caracteres despues del punto.',
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */

    /**
     * Determine if the resource should be displayed in the navigation menu.
     *
     * This method controls whether the resource will appear in the navigation menu.
     * Returning false means the resource will not be automatically added to the menu.
     *
     * @return bool
     */
    public static function displayInNavigation(): bool
    {
        return false;
    }
}
