<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->string('kode_produk')->unique();
            $table->string('nama_produk');
            $table->string('merk_produk');
            $table->float('harga_beli');
            $table->float('harga_jual');
            $table->integer('stok_produk');
            $table->string('image_product')->nullable();
            $table->string('flag_active', 1)->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('SET NULL')->onUpdate('cascade');
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
};
