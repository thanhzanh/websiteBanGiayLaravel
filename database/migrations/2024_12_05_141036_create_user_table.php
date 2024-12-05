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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_name', 255);
            $table->string('user_email', 100)->unique();
            $table->string('user_password')->nullable(); // Nếu chỉ đăng nhập bằng Google, có thể để null
            $table->string('user_status')->default('active');
            $table->string('user_phone', 10)->nullable();
            $table->string('user_image')->nullable();
            $table->string('user_address');
            $table->string('google_id')->nullable(); // Lưu ID Google
            $table->string('google_avatar')->nullable(); // Lưu avatar từ Google
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
    
};
