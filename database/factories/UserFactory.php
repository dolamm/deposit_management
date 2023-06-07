<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $avatar = [
            "https://i.pinimg.com/736x/41/43/7f/41437f690dcae5dfbf3961e3e6f2be27.jpg",
            "https://i1.sndcdn.com/avatars-000319153534-imqvgb-t500x500.jpg",
            "https://i.pinimg.com/originals/70/af/48/70af484cc16de4560211a072e0a2244c.jpg",
        ];
        return [
            'fullname' => fake()->name(),
            'email' => 'user' . Str(fake()->unique()->numberBetween(1, 10)) . '@gmail.com',
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'birthday' => fake()->date(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'role_id' => fake()->numberBetween(2, 3),
            'CMND/CCCD' => fake()->unique()->numberBetween(21, 40),
            'avatar' => fake()->randomElement($avatar),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
