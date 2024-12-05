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
            $table->bigIncrements('product_id'); 
            $table->string('product_name', 255);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2); 
            $table->integer('discount')->default(0);
            $table->integer('quantity', 100)->default(0);
            $table->text('image')->nullable();
            $table->string('status')->default('active');
            $table->string('featured'); // san pham noi bat
            $table->string('slug')->unique();
            $table->unsignedBigInteger('size_id'); 
            $table->unsignedBigInteger('product_category_id'); 
            $table->timestamps();
        
            // Foreign key constraints
            $table->foreign('size_id')->references('size_id')->on('size')->onDelete('cascade');
            $table->foreign('product_category_id')->references('product_category_id')->on('product_category')->onDelete('cascade');
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
