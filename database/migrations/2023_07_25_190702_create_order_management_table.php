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
        Schema::create('order_management', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('tenant_id'); // Foreign key to link the order to the respective workshop (tenant)
            $table->uuid('user_id'); // Foreign key to link the order to the customer
            $table->unsignedBigInteger('service_id'); // Foreign key to link the order to the service being performed
            $table->decimal('amount', 8, 2);
            $table->enum('status', ['pending', 'in_progress', 'completed', 'canceled'])->default('pending');
            // $table->timestamps();

            // $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('user_id')->references('std_id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_management');
    }
};
