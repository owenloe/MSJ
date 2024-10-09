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
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('id',autoIncrement:true)->primary();
            $table->char('nama_user',255);
            $table->char('nama_rek',255);
            $table->char('nomor_rek',255);
            $table->char('nominal_transfer',255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->char('invoice_produk',255);
            $table->char('bukti_transfer',255);
            $table->char('nama_bank',255);
            $table->char('status_transaksi',255);
            $table->char('status_pesanan',255);
            $table->char('status_pengiriman',255);
            $table->char('alasan_komplain',255);
            $table->char('gambar_komplain',255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
