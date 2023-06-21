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
        $type = $this->faker->randomElement(['deposit', 'withdraw', 'interest']);
        $money = $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 99999999.);
        if ($type == 'withdraw')
        {
            $money = $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 99999.);
        }
        return [
            'sotietkiem_id' => random_int(1, 100),
            'loaigd' => $type,
            'sotien' => $money,
            'ghichu' => $this->faker->text(),
            'ngaygiaodich' => $this->faker->dateTimeBetween('-3 days', 'now'),
        ];
    }
}
