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
            $table->string('product_name');
            $table->integer('cat_id');
            $table->integer('sup_id');
            $table->string('product_code');
            $table->string('product_godown');
            $table->string('product_route');
            $table->string('product_image');
            $table->string('buying_date');
            $table->string('expire_date');
            $table->integer('buying_price');
            $table->integer('selling_price');
            $table->timestamps();
            $table->softDeletes();
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
