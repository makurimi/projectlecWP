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
            $table->string('namabarang')->nullable();
            $table->string('images')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('stok')->nullable();
            $table->string('itemid')->default(rand(10,9));
            $table->string('keterangan')->nullable();
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
