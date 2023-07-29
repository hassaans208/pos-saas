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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id'); // Foreign key to link the subscription to the customer
            $table->unsignedBigInteger('plan_id'); // Foreign key to link the subscription to the chosen plan
            $table->decimal('amount', 8, 2);
            $table->dateTime('next_payment_date');
            // $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('tenants')->onDelete('cascade');
            $table->foreign('user_id')->references('std_id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
