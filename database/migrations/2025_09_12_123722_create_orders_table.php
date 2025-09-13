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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->integer('order_number')->unique();
            $table->decimal('payable_amount', 10, 2);
            $table->string('course_type');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('status')->default(1); 
            $table->date('order_date');
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
