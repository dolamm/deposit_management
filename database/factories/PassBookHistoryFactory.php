<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PassBookHistory>
 */
class PassBookHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sotietkiem_id' => random_int(1, 100),
            'loaigd' => $this->faker->randomElement(['deposit', 'withdraw', 'interest']),
            'sotien' => $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 9999999.),
            'ghichu' => $this->faker->text(),
            'ngaygiaodich' => $this->faker->dateTimeBetween('-3 days', 'now'),
        ];
    }
}
