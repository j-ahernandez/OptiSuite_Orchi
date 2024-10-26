<?php

namespace App\Orchid\Layouts\Production;

use App\Models\DescriptionPart;
use Carbon\Carbon;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Field;

class ProductionOrdenEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    protected $products = [];
    protected $productionDate;

    public function __construct(array $products = [], string $productionDate = null)
    {
        $this->products = $products;
        $this->productionDate = $productionDate;
    }

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        $value = $this->productionDate ? Carbon::parse($this->productionDate)->format('Y-m-d') : now()->format('Y-m-d');

        return [
            Group::make([
                // Campo para seleccionar fecha
                Input::make('production_date')
                    ->title('Fecha de Producción')
                    ->type('date')
                    ->required()
                    ->value($value),
            ]),
            // Matrix para agregar productos a la orden
            Matrix::make('products')
                ->title('Productos')
                ->columns(['Número Hoja de Resorte' => 'idDescriptionParts', 'Descripción' => 'description', 'Cantidad' => 'quantity'])
                ->fields([
                    'idDescriptionParts' => Select::make('idDescriptionParts')  // Cambiar a Select
                        ->fromModel(DescriptionPart::class, 'code', 'id')  // Usar el modelo directamente
                        ->empty('Seleccione una opción')  // Mensaje inicial
                        ->required()
                        ->searchable()
                        ->set('class', 'form-select'),
                    'description' => TextArea::make()
                        ->type('text')
                        ->required(),
                    'quantity' => Input::make()
                        ->type('number')
                        ->required(),
                ])
        ];
    }
}
