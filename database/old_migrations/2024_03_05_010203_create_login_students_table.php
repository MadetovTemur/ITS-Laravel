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
        Schema::create('login_students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Student::class, 'student_id');
            $table->ipAddress('ip_address');
            $table->string('browser');
            $table->string('time');
            // 420 second affter
            $table->set('status', [0, 1])->default(1);
            // Defoult 1 onliy, 0 exting in account
            $table->timestamps();
            $table->softDeletes()->comment('Soft Delete Admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_students');
    }
};
