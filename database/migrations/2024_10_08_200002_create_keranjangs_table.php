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
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->char('id_keranjang')->primary();
            $table->char('userid',255);
            $table->char('nama_user',255);
            $table->char('id_produk',255);
            $table->char('nama_produk',255);
            $table->char('harga_produk',255);
            $table->char('quantity',255);

            $table->foreign('userid')->references('userid')->on('penggunas');
            $table->foreign('id_produk')->references('id_produk')->on('produks');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjangs');
    }
};
