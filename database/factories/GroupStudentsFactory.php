<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Group;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupStudents>
 */
class GroupStudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => Group::all()->random()->id,
            'student_id' => Student::all()->random()->id,
            'start_at' => fake()->date(),
            'finish_at' => fake()->randomElement([fake()->date(), null]),
            'status' => (string) rand(0,4),
        ];
    }
}
