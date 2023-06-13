<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BcDoanhSo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BcDoanhSoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tongchi' => $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 999999999.),
            'tongthu' => $this->faker->randomFloat(/** @scrutinizer ignore-type */ 0, 0, 999999999.),
            'ngaytao' => $this->faker->unique()->dateTimeBetween('-2 year', 'now'),
        ];
    }
}
