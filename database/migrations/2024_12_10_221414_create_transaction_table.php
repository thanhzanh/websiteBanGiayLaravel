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
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('transaction_id'); 
            $table->unsignedBigInteger('order_id'); 
            $table->string('payment_method'); 
            $table->string('status')->default('pending'); // Trạng thái thanh toán (pending, paid, failed)
            $table->decimal('amount', 10, 2); 
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
