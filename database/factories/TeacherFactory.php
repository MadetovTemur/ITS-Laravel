<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'sure_name' => fake()->firstNameMale(),
            'jender' => (string)rand(0, 1),
            'password' => Hash::make('12345678'), // defoult password all role users
            'uuid' => fake()->unique()->uuid(),
            'username' => fake()->unique()->lastName() . (string) rand(0, 999999999),
            'telephone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'pasport_code' => 'KA'.(string)rand(0, 9999999),
            'date_birth' => fake()->dateTime(),
        ];
    }
}
