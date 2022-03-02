<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Crea asientos:
        $seat_total = $this->faker->numberBetween($min = 1, $max = 1000); // rango entre 1 y 1000
        $seat_available = $this->faker->numberBetween($min = 0, $max = $seat_total); // rango entre 0 y seat_total
        return [
            'city_origin' => $this->faker->city(),
            'country_origin' => $this->faker->country(),
            'city_destiny' => $this->faker->city(),
            'country_destiny' => $this->faker->country(),
            "date" => $this->faker->dateTimeBetween(now()), // Crea fechas a partir de hoy
            "seat_total" => $seat_total,
            "seat_available" => $seat_available,
            "price" => $this->faker->randomFloat(2, 0, 6000), // Numeros aleatorios, dos decimales entre 0 y 6000
        ];
    }
}
