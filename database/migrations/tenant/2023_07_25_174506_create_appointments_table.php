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
            $table->id();
            $table->uuid('user_id'); // Workshop owner or employee assigned to the appointment
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('automobile_id');
            $table->unsignedBigInteger('service_id');
            $table->dateTime('appointment_date');
            $table->foreign('user_id')->references('std_id')->on('users')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('automobile_id')->references('id')->on('automobiles')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
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
