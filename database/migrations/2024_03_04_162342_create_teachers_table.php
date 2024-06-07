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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sure_name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('jender', 1);
            $table->string('telephone', 40)->nullable(); // unique
            $table->string('pasport_code', 60)->nullable(); // unique
            $table->date('date_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('status', 1)->default(0); // 'Pasive teacher 0 sort by status'
            $table->rememberToken();
            $table->uuid('uuid')->unique();
            $table->timestamps();
            $table->softDeletes()->comment('Soft Delete Admin');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
