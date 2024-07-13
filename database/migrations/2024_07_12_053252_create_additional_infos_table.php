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
        Schema::create('additional_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->longText('bio')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('location', 250)->nullable();
            $table->json('preferred_pet_service')->nullable();
            $table->json('pet_interest')->nullable();
            $table->json('preferred_communication')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_infos');
    }
};
