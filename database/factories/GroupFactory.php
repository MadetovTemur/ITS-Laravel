<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{


    protected $model = \App\Models\Group::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'teacher_id' => \App\Models\Teacher::all()->random()->id,
            'subject_id' =>  \App\Models\Subject::all()->random()->id,
            'discription' => fake()->firstNameMale(),
            'uuid' => fake()->uuid(),
            'start_at' => fake()->date(),
            'status' => (string)rand(0, 3),
        ];
    }
}
