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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();

            $table->string('hashedPassword'); // NOTE: match your model name
            $table->boolean('isVerified')->default(false);

            $table->string('role')->default('user');    // e.g. admin, pharmacist, etc.
            $table->string('status')->default('active'); // e.g. active, suspended, etc.

            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
