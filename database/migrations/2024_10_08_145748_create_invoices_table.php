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
            $table->char('invoice_produk',255);
            $table->char('nama_user',255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->char('nama_produk',255);
            $table->char('unit_produk',255);
            $table->char('harga_produk',255);
            $table->char('gambar_produk',255);
            $table->char('nama_bank',255);
            $table->char('jalan',255);
            $table->char('kota',255);
            $table->char('kecamatan',255);
            $table->char('nomor_telepon',255);

            $table->foreign('id_pembayaran')->references('id')->on('payments');
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
