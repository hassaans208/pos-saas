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
        Schema::create('user_has_permits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permit_id')->nullable();
            $table->uuid('user_id');
            $table->foreign('permit_id')->references('id')->on('permits')->cascadeOnDelete();
            $table->foreign('user_id')->references('std_id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_has_permits');
    }
};
