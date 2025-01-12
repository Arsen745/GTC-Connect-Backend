<?php

namespace Database\Factories\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User\User>
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
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName(),
            'age' => $this->faker->randomDigit(),
            'phone_number' => $this->faker->phoneNumber(),
            'profession' => $this->faker->jobTitle(),
            'email' => $this->faker->unique()->safeEmail(),
            'token' => Str::random(20),
            'password' => bcrypt('password'),
            'image' => 'users/user.png',
        ];
    }
}
