<?php

namespace App\Http\Controllers;

use App\Models\BujeLC;

class BujeLCController extends Controller
{
    public function obtenerImagenBujeLC($id)
    {
        $bujeLC = BujeLC::find($id);

        if ($bujeLC && $bujeLC->picture) {
            $filePath = 'uploads/' . $bujeLC->picture;

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
