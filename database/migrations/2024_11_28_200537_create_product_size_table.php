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
        Schema::create('product_size', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('size_id');
            $table->primary(['product_id', 'size_id']);
            $table->timestamps();

            // khoa ngoai
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
            $table->foreign('size_id')->references('size_id')->on('size')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_size');
    }
};
