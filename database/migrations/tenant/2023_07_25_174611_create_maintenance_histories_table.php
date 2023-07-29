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
        Schema::create('maintenance_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('automobile_id');
            $table->unsignedBigInteger('service_id');
            $table->dateTime('service_date');
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
        Schema::dropIfExists('maintenance_histories');
    }
};
