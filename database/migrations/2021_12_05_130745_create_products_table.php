<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id');
            $table->integer('supplier_id');
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->string('product_code')->unique();
            $table->float('product_price');
            $table->float('discount_product_amount');
            $table->float('discount_product_price');
            $table->string('product_quantity');
            $table->float('product_cost');
            $table->string('product_stock');
            $table->string('product_color');
            $table->string('product_made_by');
            $table->text('description');
            $table->text('link');
            $table->text('main_image');
            $table->string('primium')->nullable();
            $table->string('featured_product')->nullable();
            $table->string('new_arrivals')->nullable();
            $table->string('ramdom_products')->nullable();
            $table->string('latest_product')->nullable();
            $table->tinyInteger('publication_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
