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
        Schema::create('barang_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id');
            $table->index('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs');

            $table->foreignId('category_id');
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_categories');
    }
};
