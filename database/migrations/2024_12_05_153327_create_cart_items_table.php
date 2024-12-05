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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('cart_id')->constrained('cart')->onDelete('cascade'); // Liên kết với bảng carts
            $table->foreignId('product_id')->constrained('product')->onDelete('cascade'); // Sản phẩm
            $table->foreignId('size_id')->nullable()->constrained('size')->onDelete('cascade'); // Kích cỡ sản phẩm (nếu có)
            $table->integer('quantity'); // Số lượng
            $table->decimal('price', 10, 2); // Giá của sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
