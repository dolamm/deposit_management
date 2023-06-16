<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
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
            'type' => random_int(0, 1) ? 'deposit' : 'withdraw',
            'amount' => $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 9999999.),
            'description' => random_int(0,1) ? "Nộp tiền" : "Rút tiền",
        ];
    }
}
