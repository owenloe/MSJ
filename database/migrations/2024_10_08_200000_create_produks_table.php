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
            $table->char('kode_produk',255)->primary();
            $table->char('nama_produk',255);
            $table->char('kategori_produk',255);
            $table->char('kuantitas_produk',255);
            $table->integer('unit_produk');
            $table->integer('harga_produk');
            $table->char('berat',255);
            $table->char('jenis',255);
            $table->char('ukuran',255);
            $table->char('warna',255);
            $table->char('image',255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('kategori_produk')->references('kode_kategori')->on('kategoris');
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
