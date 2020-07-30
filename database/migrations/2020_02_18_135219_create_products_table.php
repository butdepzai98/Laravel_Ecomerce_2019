<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->integer('quantity');                            //Số lượng
            $table->integer('price');
            $table->float('promotion')->nullable();                         //Khuyến mại
            $table->text('description')->nullable();
            $table->integer('cate_id');
            $table->integer('productType_id');
            $table->integer('status')->default(1);                  //1:Hiển thị
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
