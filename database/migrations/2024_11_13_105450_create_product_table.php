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
        Schema::create('product', function (Blueprint $table) {
            $table->string('product_id'); // Khóa chính
            $table->string('product_name', 50); // Tên sản phẩm với giới hạn 50 ký tự
            $table->text('description')->nullable(); // Mô tả sản phẩm
            $table->text('price'); // Giá sản phẩm
            $table->decimal('discount', 5, 2)->default(0); // Chiết khấu
            $table->integer('quantity')->default(0); // Số lượng sản phẩm
            $table->text('image')->nullable(); // Đường dẫn ảnh sản phẩm
            $table->tinyInteger('status')->default(1); // Trạng thái sản phẩm (1 là kích hoạt, 0 là không)
            $table->string('size')->nullable(); // Kích cỡ
            $table->unsignedBigInteger('category_id'); // Khóa ngoại đến bảng danh mục
            $table->unsignedBigInteger('admin_id'); // Khóa ngoại đến bảng admin
            $table->timestamps(); // Tạo cột created_at và updated_at
            // Thiết lập khóa ngoại (nếu có bảng `categories` và `admins`)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
