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
        Schema::create('missings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('name'); // Name of the missing pet
            $table->text('description'); // Description of the missing pet
            $table->date('missing_since'); // Date when the pet went missing
            $table->string('location'); // Location where the pet was last seen
            $table->string('contact_number'); // Contact number for the owner or the person who reported the missing pet
            $table->string('image')->nullable(); // Image of the missing pet (nullable in case no image is provided)
            $table->boolean('is_found')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missings');
    }
};
