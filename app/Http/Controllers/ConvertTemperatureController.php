<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertTemperatureController extends Controller
{
    public function __invoke($value, $unit)
    {
        $result = $this->convertTemperature($value, $unit);

        return response()->json(['result' => $result]);
    }

    private function convertTemperature($value, $unit)
    {
        switch ($unit) {
            case 'celsius_to_fahrenheit':
                return($value * 9 / 5) + 32;
            case 'fahrenheit_to_celsius':
                return($value - 32) * 5 / 9;
            default:
                return ['error' => 'Invalid unit'];
        }
    }
}
