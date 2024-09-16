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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('appointment_by'); // ID of the user making the appointment
            $table->unsignedBigInteger('appointment_in'); // ID of the clinic
            $table->date('appointment_date'); // Date of the appointment
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('appointment_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('appointment_in')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
