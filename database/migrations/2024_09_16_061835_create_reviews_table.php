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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rated_by'); // Reference to the user
            $table->unsignedBigInteger('rated_to'); // Reference to the product being reviewed
            $table->integer('rating')->unsigned(); // Rating (1-5)
            $table->text('comment')->nullable(); // Review comment
            $table->timestamps(); // Created at and Updated at

            // Foreign key constraints
            $table->foreign('rated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rated_to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
