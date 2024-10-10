<?php

namespace App\Http\Controllers;

use App\Models\TipoHojaVehiculo;

class TipoHojaVehiculoController extends Controller
{
    public function obtenerImagenTipoHoja($id)
    {
        $tipoHojaVehiculo = TipoHojaVehiculo::find($id);

        if ($tipoHojaVehiculo && $tipoHojaVehiculo->upload) {
            $filePath = 'uploads/' . $tipoHojaVehiculo->upload;

            if (file_exists(storage_path('app/public/' . $filePath))) {
                return response()->json([
                    'imageUrl' => asset('storage/' . $filePath),
                ]);
            }
        }

        return response()->json([
            'imageUrl' => asset('storage/no-preview.jpg'),
        ]);
    }
}