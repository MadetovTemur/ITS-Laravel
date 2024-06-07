<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// use App\Enum

return new class extends Migration
{
    /**
     * Run the migrations.
     * $table->ipAddress('ip_address');
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sure_name')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('jender', 1); // Enums folder 
            $table->string('telephone', 40)->nullable(); // unique
            $table->uuid('uuid')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes()->comment('Soft Delete Admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
