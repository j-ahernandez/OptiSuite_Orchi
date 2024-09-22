<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class TipoHojaVechiculosResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\TipoHojaVechiculos::class;

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        // Este método define el nombre que aparecerá en el menú para este recurso.
        return __('Tipo Hoja');
    }

    /**
     * Get the title for the resource.
     *
     * @return string
     */
    public function title(): string
    {
        // Este método define el título que se mostrará en la vista de detalles del recurso.
        return __('Tipo Hoja');
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
                Input::make('tipo_hoja')
                    ->title('Tipo Hoja')
                    ->placeholder('Ingrese el tipo de la hoja')
                    ->autofocus()
                    ->required(),
                Upload::make('upload')
                    ->acceptedFiles('image/*')  // Solo acepta imágenes
                    ->maxFiles(1)  // Opcional: Limita la carga a un solo archivo
                    ->maxSize(10 * 1024)  // Opcional: Limita el tamaño del archivo a 10 MB (ajusta según sea necesario)
                    ->help('Sólo se permiten imágenes (JPG, PNG, GIF). Solo puede cargar un archivo, su tamaño debe ser 10 * 1024')  // Mensaje opcional para el usuario
                    ->disk('public')  // Asegúrate de definir el disco de almacenamiento si es necesario
                    ->path('uploads')  // Define una ruta de almacenamiento si es necesario
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
            TD::make('upload', 'Tipo de Hoja')
                ->sort()
                ->filter(Input::make()),
            TD::make('foto_hoja', 'Imagen')
                ->render(function ($model) {
                    if ($model->upload) {
                        return "<img src='" . asset('storage/' . $model->upload) . "' style='width: 100px; height: auto;' />";
                    }
                    return 'No Image';
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
            Sight::make('id'),
            Sight::make('tipo_hoja', 'Tipo la hoja'),
            Sight::make('upload', 'Imagen')
                ->render(function ($model) {
                    if ($model->upload) {
                        return "<img src='" . asset('storage/' . $model->upload) . "' style='width: 100px; height: auto;' />";
                    }
                    return 'No Image';
                }),
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
