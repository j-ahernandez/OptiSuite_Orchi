<?php

namespace App\Http\Controllers;

use App\Models\BujeLC;

class BujeLCController extends Controller
{
    /**
     * Obtiene la URL de la imagen de un buje específico.
     *
     * @param int $id El ID del buje.
     * @return \Illuminate\Http\JsonResponse La URL de la imagen en formato JSON.
     */
    public function obtenerImagenBujeLC($id)
    {
        // Buscar el buje por su ID
        $bujeLC = BujeLC::find($id);

        // Verificar si el buje existe y tiene una imagen subida
        if ($bujeLC && $bujeLC->picture) {
            $filePath = 'uploads/' . $bujeLC->picture;

            // Verificar si el archivo de imagen existe en el almacenamiento
            if (file_exists(storage_path('app/public/' . $filePath))) {
                return response()->json([
                    'imageUrl' => asset('storage/' . $filePath),
                ]);
            }
        }

        // En caso de que no se encuentre la imagen, devolver una imagen por defecto
        return response()->json([
            'imageUrl' => asset('storage/no-preview.jpg'),
        ]);
    }
}