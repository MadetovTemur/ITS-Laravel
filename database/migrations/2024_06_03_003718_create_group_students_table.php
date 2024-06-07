<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('group_students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Group::class, 'group_id')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Student::class, 'student_id')->cascadeOnDelete();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->string('status', 1)->default(0); // App\Enums\StudentStatus
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_students');
    }
};
