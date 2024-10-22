<?php

namespace App\Orchid\Resources;

use App\Models\DescriptionPart;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ProductionOrdenResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ProductionOrden::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                // Campo para seleccionar fecha
                Input::make('production_date')
                    ->title('Fecha de Producción')
                    ->type('date')
                    ->required()
                    ->value(now()->format('Y-m-d')),
            ]),
            // Matrix para agregar productos a la orden
            Matrix::make('products')
                ->title('Productos')
                ->columns(['Número Hoja de Resorte' => 'idDescriptionParts', 'Descripción' => 'description', 'Cantidad' => 'quantity'])
                ->fields([
                    'idDescriptionParts' => Select::make('idDescriptionParts')  // Cambiar a Select
                        ->options($this->getDescriptionParts())  // Obtener opciones
                        ->empty('Seleccione una opción')  // Mensaje inicial
                        ->required(),
                    'description' => TextArea::make()
                        ->type('text')
                        ->required(),
                    'quantity' => Input::make()
                        ->type('number')
                        ->required(),
                ])
        ];
    }

    /**
     * Get the list of description parts for the select field.
     *
     * @return array
     */
    protected function getDescriptionParts(): array
    {
        return DescriptionPart::all()->pluck('code', 'id')->toArray();
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
            TD::make('production_date', 'Fecha de Producción')
                ->sort()  // Permitir ordenación por fecha de producción
                ->filter(Input::make())  // Filtro de entrada para la fecha de producción
                ->render(function ($model) {
                    return $model->production_date->toDateTimeString();  // Mostrar solo la fecha
                }),
            TD::make('idDescriptionParts', 'Número Hoja de Resorte')
                ->render(function ($model) {
                    // Accede al nombre o descripción de la parte desde el modelo
                    return $model->descriptionPart->description ?? 'Desconocido';
                }),
            TD::make('description', 'Descripción')
                ->render(function ($model) {
                    return $model->description;  // Este debe ser el campo correcto
                }),
            TD::make('quantity', 'Cantidad')
                ->render(function ($model) {
                    return $model->quantity;  // Este debe ser el campo correcto
                }),
            TD::make('status_id', 'Estado')
                ->render(function ($model) {
                    return $model->status ? $model->status->name : 'Desconocido';  // Obtiene el nombre del estado
                }),
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
            Sight::make('production_date', 'Fecha de Producción')
                ->render(function ($model) {
                    return $model->production_date->toDateTimeString();
                }),
                Sight::make('idDescriptionParts', 'Número Hoja de Resorte')
                ->render(function ($model) {
                    // Accede al nombre o descripción de la parte desde el modelo
                    return $model->descriptionPart->description ?? 'Desconocido';
                }),
            Sight::make('description', 'Descripción')
                ->render(function ($model) {
                    // Suponiendo que esta descripción viene de la matriz
                    return $model->description;  // Reemplaza según la estructura del matrix
                }),
            Sight::make('quantity', 'Cantidad')
                ->render(function ($model) {
                    // También proviene de la matriz
                    return $model->quantity;  // Reemplaza según la estructura del matrix
                }),
            Sight::make('status_id', 'Estado')
                ->render(function ($model) {
                    return $model->status ? $model->status->name : 'Desconocido';  // Obtiene el nombre del estado
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

    /**
     * Get the validation rules that apply to save/update.
     *
     * @return array
     */
    public function rules(Model $model): array
    {
        return [
            'idDescriptionParts' => 'required|exists:description_parts,id',  // Requerido, debe existir en la tabla description_parts
            'description' => 'nullable|string|max:255',  // Opcional, cadena de texto, máximo 255 caracteres
            'quantity' => 'required|integer|min:1',  // Requerido, debe ser un número entero mayor o igual a 1
            'status_id' => 'nullable|exists:statuses,id',  // Opcional, debe existir en la tabla statuses
            'production_date' => 'required|date',  // Requerido, debe ser una fecha válida
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
            'idDescriptionParts.required' => 'El campo de descripción de partes es obligatorio.',
            'idDescriptionParts.exists' => 'La descripción de partes seleccionada no es válida.',
            'description.string' => 'La descripción debe ser un texto.',
            'description.max' => 'La descripción no puede tener más de 255 caracteres.',
            'quantity.required' => 'La cantidad es obligatoria.',
            'quantity.integer' => 'La cantidad debe ser un número entero.',
            'quantity.min' => 'La cantidad debe ser al menos 1.',
            'status_id.exists' => 'El estado seleccionado no es válido.',
            'production_date.required' => 'La fecha de producción es obligatoria.',
            'production_date.date' => 'La fecha de producción debe ser una fecha válida.',
        ];
    }

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        // Este método define el nombre que aparecerá en el menú para este recurso.
        return __('Ordenes de Producción');
    }

    /**
     * Get the title for the resource.
     *
     * @return string
     */
    public function title(): string
    {
        // Este método define el título que se mostrará en la vista de detalles del recurso.
        return __('Ordenes de Producción');
    }

    /**
     * Get the singular name of the resource.
     *
     * @return string
     */
    public static function singular(): string
    {
        return __('Ordenes de Producción');
    }

    /**
     * Get the plural name of the resource.
     *
     * @return string
     */
    public static function plural(): string
    {
        return __('Ordenes de Producción');
    }

    /**
     * Get the description of the resource.
     *
     * @return string
     */
    public static function description(): string
    {
        return __('Ordenes de Producción');
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