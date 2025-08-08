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
        Schema::create('qty_based_prices', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('price')->nullable();
            $table->string('save_price')->nullable();
            $table->string('more_qty')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qty_based_prices');
    }
};
