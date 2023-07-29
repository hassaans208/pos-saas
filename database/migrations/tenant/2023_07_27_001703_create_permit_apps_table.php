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
        Schema::create('permit_apps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('permit_id');
            $table->foreign('permit_id')->references('id')->on('permits')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permit_apps');
    }
};
