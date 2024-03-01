<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertVolumeController extends Controller
{
    public function __invoke($value, $unit)
    {
        $result = $this->convertVolume($value, $unit);

        return response()->json(['result' => $result]);
    }

    private function convertVolume($value, $unit)
    {
        $conversionFactors = [
            'liters_to_gallons' => 0.264172,
            'gallons_to_liters' => 3.78541,
        ];

        if (isset($conversionFactors[$unit])) {
            return $value * $conversionFactors[$unit];
        } else {
            return ['error' => 'Invalid unit'];
        }
    }
}
