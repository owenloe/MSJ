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
        Schema::create('ratings', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('kode_user',255);
            $table->char('nama_user',255);
            $table->char('rating',255);
            $table->char('komentar',255);
            $table->char('gambar_produk',255);
            $table->timestamps();

            $table->foreign('kode_user')->references('id')->on('penggunas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
