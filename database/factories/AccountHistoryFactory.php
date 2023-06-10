<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountHistory>
 */
class AccountHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_number' => '0916036287',
            'type' => 'deposit',
            'amount' => $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 99999.),
            'description' => $this->faker->text,
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now', 'Asia/Ho_Chi_Minh'),
        ];
    }
}
