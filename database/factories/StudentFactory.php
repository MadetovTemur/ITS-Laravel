<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'telephone' => fake()->phoneNumber(),
            'jender' => (string)rand(0, 1),
            'pasport_code' =>'KA'.(string)rand(0, 9999999),
            'date_birth' => fake()->dateTime(),
            'address' => fake()->address(),
            'uuid' => fake()->uuid()
        ];
    }
}
