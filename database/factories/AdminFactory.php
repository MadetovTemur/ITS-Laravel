<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{


    protected $model = Admin::class;
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
            'telephone' => fake()->e164PhoneNumber(),
            'username' => fake()->unique()->lastName(),
            'jender' => (string)rand(0, 1),
            'password' => Hash::make('12345678'), // defoult password all role users
        ];
    }
}
