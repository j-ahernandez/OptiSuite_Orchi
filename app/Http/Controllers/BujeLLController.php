<?php

namespace App\Http\Controllers;

use App\Models\BujeLL;

class BujeLLController extends Controller
{
    public function obtenerImagenBujeLL($id)
    {
        $bujeLL = BujeLL::find($id);

        if ($bujeLL && $bujeLL->picture) {
            $filePath = 'uploads/' . $bujeLL->picture;

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
