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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sure_name');
            $table->string('jender', 1);
            $table->string('telephone', 40)->nullable(); // unique
            $table->string('pasport_code', 60)->nullable(); // unique
            $table->date('date_birth')->nullable();
            $table->string('address')->nullable();
            $table->uuid('uuid')->nullable(); // unique
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
