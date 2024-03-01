<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertWeightController extends Controller
{
    public function __invoke($value, $unit)
    {
        // Agafem el resultat de la conversió
        if (!is_numeric($value)) {
            return response()->json(['code' => 400, 'message'=> 'Value or Unit not numeric.']);
        }

        // Agafem el resultat de la conversió
        $result = $this->convertLength($value, strtolower($unit));

        // Mostrem el resultats
        return response()->json(['code' => 200, 'message'=> 'Value calculated', "data" => ['value' => $value, 'unit' => $unit], 'result' => $result]); 
    }

    /**
     * Funció per a fer la conversió
     * @return double el resultat
     */
    private function convertLength($value, $unit)
    {
        switch ($unit) {
            case 'kilograms':
                return $value * 2.20462; 
            case 'pounds':
                return $value / 2.20462; 
            default:
                return ['error' => 'Unreconigzed unit'];
        }
    }
}
