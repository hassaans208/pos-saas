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
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->uuid('std_id')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('postal_code');
            $table->string('ntn')->nullable();
            $table->string('registeration_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();;
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->unsignedBigInteger('state_id')->nullable();;
            $table->foreign('state_id')->references('id')->on('states')->cascadeOnDelete();
            $table->unsignedBigInteger('city_id')->nullable();;
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->unsignedBigInteger('owner_id')->nullable();;
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
