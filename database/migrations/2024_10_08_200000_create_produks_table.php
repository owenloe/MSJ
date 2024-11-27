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
        Schema::create('produks', function (Blueprint $table) {
            $table->char('id_produk',255)->primary();
            $table->char('nama_produk',255);
            $table->char('kategori_produk',255);
            $table->integer('quantity_produk');
            $table->integer('harga_produk');
            $table->integer('modal_produk');
            $table->char('berat',255);
            $table->char('jenis',255);
            $table->char('ukuran',255);
            $table->char('warna',255);
            $table->char('image',255);
            $table->timestamps();

            $table->foreign('kategori_produk')->references('id_kategori')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
