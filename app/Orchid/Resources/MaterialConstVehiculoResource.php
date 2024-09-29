<?php

namespace App\Orchid\Resources;

use Illuminate\Database\Eloquent\Model;
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

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        // Este método define el nombre que aparecerá en el menú para este recurso.
        return __('Material Construcción');
    }

    /**
     * Get the title for the resource.
     *
     * @return string
     */
    public function title(): string
    {
        // Este método define el título que se mostrará en la vista de detalles del recurso.
        return __('Material Construcción');
    }

    /**
     * Get the singular name of the resource.
     *
     * @return string
     */
    public static function singular(): string
    {
        return __('Material Construcción');
    }

    /**
     * Get the plural name of the resource.
     *
     * @return string
     */
    public static function plural(): string
    {
        return __('Materiales Construcción');
    }

    /**
     * Get the description of the resource.
     *
     * @return string
     */
    public static function description(): string
    {
        return __('Gestión de Materiales de Construcción');
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

    /**
     * Get the validation rules that apply to save/update.
     *
     * @return array
     */
    public function rules(Model $model): array
    {
        return [
            'no_mat' => 'required|max:5',  // Regla de requerimiento y máximo de 5
            'width_plg' => 'required',
            'thick_plg' => 'required',
            'width_mm' => 'required',
            'thick_mm' => 'required',
            'Grueso' => 'required',
            'material_combinado' => 'required',
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
            'no_mat.required' => 'El número de material es obligatorio.',
            'no_mat.max' => 'El número de material no puede tener más de 5 caracteres.',
            'width_plg.required' => 'El ancho en pulgadas es obligatorio.',
            'thick_plg.required' => 'El grosor en pulgadas es obligatorio.',
            'width_mm.required' => 'El ancho en milímetros es obligatorio.',
            'thick_mm.required' => 'El grosor en milímetros es obligatorio.',
            'Grueso.required' => 'El grueso es obligatorio.',
            'material_combinado.required' => 'El material combinado es obligatorio.',
        ];
    }
}
