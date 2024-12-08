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
        Schema::create('user_addresss', function (Blueprint $table) {
            $table->bigIncrements('user_address_id'); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Liên kết với bảng users
            $table->string('label')->nullable(); // Loại địa chỉ (Nhà, Công ty)
            $table->string('receiver_name'); // Tên người nhận
            $table->string('receiver_phone'); // Số điện thoại người nhận
            $table->text('address'); // Địa chỉ chi tiết
            $table->boolean('is_default')->default(false); // Địa chỉ mặc định
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresss');
    }
};
