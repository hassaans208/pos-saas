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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('tenant_id'); // Foreign key to link the transaction to the respective workshop (tenant)
            $table->enum('type', ['income', 'expense']);
            $table->enum('status', ['pending', 'complete', 'failed']);
            $table->unsignedBigInteger('related_id')->nullable(); // Foreign key to link the transaction to a related entity (e.g., order, invoice, etc.)
            $table->decimal('amount', 10, 2);
            $table->string('description')->nullable();
            $table->string('date')->nullable();
            // $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
