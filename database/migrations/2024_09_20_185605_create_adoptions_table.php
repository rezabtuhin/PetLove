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
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Column for the name of the adoption item
            $table->string('image')->nullable(); // Column for the image, nullable in case no image is provided
            $table->integer('age')->nullable(); // Column for age, nullable if age is not mandatory
            $table->text('description')->nullable(); // Column for description, nullable to allow for empty descriptions
            $table->tinyInteger('is_adopted')->default(0);
            $table->foreignId('listed_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions');
    }
};
