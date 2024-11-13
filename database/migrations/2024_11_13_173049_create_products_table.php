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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('short_des');
            $table->string('price');
            $table->string('discount');
            $table->string('discount_price');
            $table->string('image');
            $table->string('stock');
            $table->string('star');
            $table->enum('remark', ['popular', 'new', 'top', 'special', 'trending', 'regular']);

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');

            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('brand_id')->references('id')->on('brands')->restrictOnDelete()->restrictOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
