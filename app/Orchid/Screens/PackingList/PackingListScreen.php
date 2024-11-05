<?php

namespace App\Orchid\Screens\PackingList;

use App\Models\pkglist;
use App\Orchid\Layouts\PackingList\PackingListTable;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;

class PackingListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'pkglist' => pkglist::paginate(15)
        ];
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
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Crear'))
                ->icon('bs.check-circle')
                ->type(Color::PRIMARY)
                ->method('createPackingList'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PackingListTable::class
        ];
    }

    /**
     * Redirige a la pantalla de creación de una nueva orden de producción.
     *
     * Este método se utiliza para navegar a la página donde se puede crear
     * una nueva orden de producción dentro del sistema. Al ser invocado,
     * redirige al usuario a la ruta definida para la creación de órdenes de
     * producción.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createPackingList()
    {
        return redirect()->route('platform.packing.list.create');
    }
}
