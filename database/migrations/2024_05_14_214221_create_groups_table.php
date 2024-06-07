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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->foreignIdFor(\App\Models\Teacher::class, 'teacher_id')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Subject::class, 'subject_id')->cascadeOnDelete();
            $table->string('discription');
            $table->date('start_at')->nullable();
            $table->date('finish_at')->nullable();
            $table->uuid();
            $table->string('status', 1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
