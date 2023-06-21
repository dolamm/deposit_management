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
        $type = random_int(0, 1) ? 'deposit' : 'withdraw';
        $amount = $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 99999999.);
        if($type=='withdraw')
        {
            $amount = $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 999999.);
        }
        return [
            'type' => random_int(0, 1) ? 'deposit' : 'withdraw',
            'amount' => $amount,
            'description' => random_int(0,1) ? "Nộp tiền" : "Rút tiền",
        ];
    }
}
