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
        Schema::create('invoices', function (Blueprint $table) {
            $table->char('id_invoice',255)->primary();
            $table->char('id_pembayaran',255);
            $table->char('userid',255);
            $table->char('nama_user',255);
            $table->char('id_produk',255);
            $table->char('nama_produk',255);
            $table->integer('quantity_produk');
            $table->integer('harga_produk');
            $table->char('jalan',255);
            $table->char('kota',255);
            $table->char('kecamatan',255);
            $table->char('nomor_telepon',255);
            $table->timestamps();

            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('payments');
            $table->foreign('userid')->references('userid')->on('penggunas');
            $table->foreign('id_produk')->references('id_produk')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
