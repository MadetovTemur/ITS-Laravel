<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            \App\Models\Subject::factory(6)->create(),
            \App\Models\Admin::factory(1)->create(),
            \App\Models\Teacher::factory(3)->create(),
            \App\Models\Student::factory(30)->create(),
            \App\Models\TeacherSubjects::factory(10)->create(),
            \App\Models\Group::factory(10)->create()
        ]);
    }
}
