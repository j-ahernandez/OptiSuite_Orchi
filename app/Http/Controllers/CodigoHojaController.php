<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CodigoHojaController extends Controller
{
    /**
     * Obtiene el código de tipo de un vehículo específico.
     *
     * @param int $id El ID del vehículo.
     * @return JsonResponse El número del vehículo en formato JSON.
     */
    public function obtenerCodigoTipoVehiculo(int $id): JsonResponse
    {
        // Si el ID es 0, devolver directamente el número 0
        if ($id === 0) {
            return response()->json(['numero' => 0]);
        }

        // Buscar el vehículo por su typeid
        $vehiculo = Vehiculo::where('typeid', $id)->first();

        // Verificar si el vehículo existe
        if ($vehiculo) {
            return response()->json(['numero' => $vehiculo->numero, 'message' => 'Código obtenido exitosamente.']);
        }

        // En caso de que no se encuentre el vehículo
        return response()->json(['error' => 'Vehículo no encontrado'], 404);
    }

    /*     public function obtenerCodigoTipoVehiculo(int $id, int $model = null, $position = null): JsonResponse
    {
        // Si el ID es 0, devolver directamente el número 0
        if ($id === 0) {
            return response()->json(['numero' => 0]);
        }

        $modelo = '';

        if (isset($model)) {
            $modelo = 'AND vehiculos.id = ' . ($model ?? '');
        }

        // $modelo = 'AND'.($model ?? '');

        // Realiza la consulta
        $where = 'typeid = ?' . $modelo;

        $vehiculo = DB::select("SELECT numero FROM vehiculos WHERE $where", [$id]);

        // Verificar si el vehículo existe
        if (!empty($vehiculo)) {
            $numero = $vehiculo[0]->numero;  // Accede a la propiedad 'numero'
            return response()->json(['numero' => $numero]);
        }

        // En caso de que no se encuentre el vehículo
        return response()->json(['error' => 'Vehículo no encontrado'], 404);
    } */
}
