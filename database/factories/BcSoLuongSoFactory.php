<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BcSoLuongSo>
 */
class BcSoLuongSoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "sl_somoi" => fake()->numberBetween(0, 100),
            "sl_sodong" => fake()->numberBetween(0, 100),
            'ngaytao' => $this->faker->unique()->dateTimeBetween('-2 year', 'now'),
        ];
    }
}
