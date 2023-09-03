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

            $table->decimal('amount', 8, 2);
            $table->uuid('transaction_id')->unique();

            $table->boolean('paid')->default(false);
            $table->enum('payment_method', ['cash', 'cheque', 'online'])->default('cash');
            $table->enum('invoice_type', ['insurance', 'direct_client'])->default('direct_client');
            $table->boolean('intervals')->default(false);
            $table->date('paid_on')->default(null)->nullable();
            $table->enum('job_type', ['maintainence', 'job'])->default('job');
            $table->string('services')->nullable();
            $table->string('account_number')->nullable();
            $table->string('advance_payment')->nullable();
            $table->string('depreciation')->nullable();
            $table->unsignedBigInteger('user_id'); // Workshop owner or employee assigned to the appointment
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('automobile_id');
            $table->foreign('automobile_id')->references('id')->on('automobiles')->onDelete('cascade');
            $table->unsignedBigInteger('appointment_id');
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
