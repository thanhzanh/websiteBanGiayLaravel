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
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('admin_id');
            $table->string('admin_name', 255);
            $table->string('admin_email', 100)->unique();
            $table->string('admin_password');
            $table->string('admin_phone', 10)->nullable();
            $table->string('admin_image')->nullable();
            $table->string('admin_desc')->nullable();
            $table->boolean('is_fixed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
