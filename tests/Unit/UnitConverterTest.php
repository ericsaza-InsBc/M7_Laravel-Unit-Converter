<?php

namespace Tests\Unit;

use Tests\TestCase;

class UnitConverterTest extends TestCase
{
    public function testConversorLongitudes()
    {
        $this->get('/convert/length/10/meters')
            ->assertStatus(200)
            ->assertJson(['result' => 32.8084]);

        $this->get('/convert/length/20/feet')
            ->assertStatus(200)
            ->assertJson(['result' => 6.096]);
    }

    public function testConversorPeso()
    {
        $this->get('/convert/weight/10/kilograms')
            ->assertStatus(200)
            ->assertJson(['result' => 22.0462]);

        $this->get('/convert/weight/20/pounds')
            ->assertStatus(200)
            ->assertJson(['result' => 9.07184]);
    }

    public function testConversorTemperatura()
    {
        $this->get('/convert/temperature/0/celsius')
            ->assertStatus(200)
            ->assertJson(['result' => 32]);

        $this->get('/convert/temperature/32/fahrenheit')
            ->assertStatus(200)
            ->assertJson(['result' => 0]);
    }

    public function testConversionVolumen()
    {
        $this->get('/convert/volume/10/liters')
            ->assertStatus(200)
            ->assertJson(['result' => 2.64172]);

        $this->get('/convert/volume/5/gallons')
            ->assertStatus(200)
            ->assertJson(['result' => 18.9271]);
    }

    public function testConversionVelocidad()
    {
        $this->get('/convert/speed/100/kilometers')
            ->assertStatus(200)
            ->assertJson(['result' => 62.1371]);

        $this->get('/convert/speed/50/miles')
            ->assertStatus(200)
            ->assertJson(['result' => 80.4672]);
    }
}
