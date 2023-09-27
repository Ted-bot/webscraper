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
        Schema::create('scraped_albert_heijn_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->float('product_price',8,2)->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_link')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_promotion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scraped_albert_heijn_products');
    }
};
