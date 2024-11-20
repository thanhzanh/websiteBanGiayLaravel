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
        Schema::create('brand', function (Blueprint $table) {
            $table->bigIncrements('brand_id'); // PK
            $table->string('brand_name', 50);
            $table->text('logo')->nullable();
            $table->text('brand_product')->nullable();
            $table->integer('year_of_manufacture')->nullable();
            $table->string('country', 50)->nullable();
            $table->decimal('revenue', 10, 2)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand');
    }
};
