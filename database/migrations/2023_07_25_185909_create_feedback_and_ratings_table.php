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
        Schema::create('feedback_and_ratings', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id'); // Foreign key to link the feedback and rating to the respective workshop (tenant)
            $table->text('feedback')->nullable();
            $table->unsignedTinyInteger('rating'); // Rating on a scale of 1 to 5

            $table->foreign('user_id')->references('std_id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_and_ratings');
    }
};
