<?php

namespace App\Orchid\Screens\PackingList;

use App\Models\pkglist;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Color;

class PackingListScreenLegend extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(int $pkglist = null): iterable
    {
        $pkgListSelect = [
            'no_contact' => null,
            'steel_grande' => null,
            'pkg_Standard' => null,
            'DIA' => null,
            'pkg_Lenght' => null,
            'pkg_Weight' => null,
            'pkg_Bars' => null,
            'pkg_Bundles' => null,
        ];

        if ($pkglist) {
            try {
                // Obtener el registro de pkglist por su ID
                $pkgListValue = pkglist::findOrFail($pkglist);
                // Combinar los datos obtenidos con el array base
                $pkgListSelect = array_merge($pkgListSelect, $pkgListValue->toArray());
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                // Manejo del error si el registro no es encontrado
                Toast::error(__('Error: El registro no fue encontrado.'));
                // Puedes retornar el array inicial o algún valor por defecto si lo prefieres
            }
        }

        // Retorna el array con la clave 'packingList'
        return ['packingList' => $pkgListSelect];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Packing List';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Visualizar los Packing List asociadas existentes en el sistema';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        // El ID ya está disponible aquí
        /*$pkglistId = request()->route('pkglist');  // O, si ya lo tienes en otra forma, puedes acceder a él directamente

        if ($pkglistId === null) {
            dd('pkglist es null');  // Mensaje para depuración
        }

        return [
            Button::make(__('Editar'))
                ->icon('bs.check-circle')
                ->type(Color::PRIMARY)
                ->method('editRecord', [
                    'id' => $pkglistId  // Enviando el ID del modelo
                ]),
            Button::make(__('Eliminar'))
                ->icon('bs.check-circle')
                ->type(Color::PRIMARY)
                ->method('deleteRecord', [
                    'id' => $pkglistId  // Enviando el ID del modelo
                ]),
        ];*/

        return [];
    }

    /**
     * Los elementos de diseño de la pantalla.
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            /*Layout::legend('packingList', [
                Sight::make('no_contact', 'No Contacto'),
                Sight::make('steel_grande', 'Steel Grande'),
                Sight::make('pkg_Standard', 'Paquete Estándar'),
                Sight::make('DIA', 'DIA'),
                Sight::make('pkg_Lenght', 'Longitud del Paquete'),
                Sight::make('pkg_Weight', 'Peso del Paquete'),
                Sight::make('pkg_Bars', 'Barras en el Paquete'),
                Sight::make('pkg_Bundles', 'Paquetes'),
            ]),*/
        ];
    }

    /**
     * Edit record method.
     *
     * @param int $id
     */
    public function editRecord(int $id)
    {
        // Mostrar mensaje de éxito
        Toast::info(__('Bienvenido a Editar con el id ' . $id));
    }

    /**
     * Delete record method.
     *
     * @param int $id
     */
    public function deleteRecord(int $id)
    {
        // Mostrar mensaje de éxito
        Toast::info(__('Bienvenido a Eliminar con el id ' . $id));
    }
}
