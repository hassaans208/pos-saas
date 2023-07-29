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
        Schema::create('surveyors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_company_id'); // Foreign key to link surveyors to their respective insurance companies
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            // Add more fields as needed to store additional information about surveyors
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveyors');
    }
};
