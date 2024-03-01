<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertWeightController extends Controller
{
    public function __invoke($value, $unit)
    {
        $result = $this->convertWeight($value, $unit);
        
        return response()->json(['result' => $result]);
    }

    private function convertWeight($value, $unit)
    {
        $conversionFactors = [
            'kilograms_to_pounds' => 2.20462,
            'pounds_to_kilograms' => 0.453592,
        ];

        if (isset($conversionFactors[$unit])) {
            return $value * $conversionFactors[$unit];
        } else {
            return ['error' => 'Invalid unit'];
        }
    }
}
