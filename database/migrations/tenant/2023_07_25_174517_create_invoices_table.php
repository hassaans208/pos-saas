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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('appointment_id');
            $table->decimal('amount', 8, 2);
            $table->boolean('paid')->default(false);
            $table->enum('payment_method', ['cash', 'cheque'])->default('cash');
            $table->date('paid_on')->default(null)->nullable();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
