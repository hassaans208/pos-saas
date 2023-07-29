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
        Schema::create('queries', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('tenant_id'); // Foreign key to link the complaint to the respective workshop (tenant)
            $table->unsignedBigInteger('customer_id'); // Foreign key to link the complaint to the customer
            $table->uuid('complaint_number');
            $table->string('subject');
            $table->text('description');
            $table->enum('status', ['open', 'in_progress', 'resolved', 'closed'])->default('open');
            // $table->timestamps();

            // $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
};
