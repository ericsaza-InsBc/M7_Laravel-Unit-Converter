<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertSpeedController extends Controller
{
    public function __invoke($value, $unit)
    {
        $result = $this->convertSpeed($value, $unit);

        return response()->json(['result' => $result]);
    }

    private function convertSpeed($value, $unit)
    {
        $conversionFactors = [
            'kph_to_mph' => 0.621371,
            'mph_to_kph' => 1.60934,
        ];

        if (isset($conversionFactors[$unit])) {
            return $value * $conversionFactors[$unit];
        } else {
            return ['error' => 'Invalid unit'];
        }
    }
}
