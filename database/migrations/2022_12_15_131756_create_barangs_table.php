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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('namabarang');
            $table->string('images');
            $table->integer('harga');
            $table->integer('stok')->nullable();
            $table->string('itemid')->default(rand(10,9));
            $table->string('keterangan');
            $table->integer('category_id');
            $table->boolean('is_ready')->default(true);
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
        Schema::dropIfExists('barangs');
    }
};
