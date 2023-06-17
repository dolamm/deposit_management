<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kyhan;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sotietkiem>
 */
class SotietkiemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1, 11),
            'makyhan' => Kyhan::all()->random()->makyhan,
            'sotiengui' => $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 9999999.),
            'ngaymoso' => $this->faker->dateTimeBetween('-3 days', 'now'),
        ];
    }
}
