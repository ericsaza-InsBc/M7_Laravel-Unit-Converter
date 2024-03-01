<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertLengthController extends Controller
{
    public function __invoke($value, $unit)
    {
        $result = $this->convertLength($value, $unit);
        
        return response()->json(['result' => $result]);
    }

    private function convertLength($value, $unit)
    {
        $conversionFactors = [
            'meters_to_feet' => 3.28084,
            'feet_to_meters' => 0.3048,
        ];

        if (isset($conversionFactors[$unit])) {
            return $value * $conversionFactors[$unit];
        } else {
            return ['error' => 'Invalid unit'];
        }
    }
}
