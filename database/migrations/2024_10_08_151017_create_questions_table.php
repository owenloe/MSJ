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
        Schema::create('questions', function (Blueprint $table) {
            $table->char('id_tanya')->primary();
            $table->char('id_produk',255);
            $table->char('userid',255);
            $table->char('nama_user',255);
            $table->char('pertanyaan',255);
            $table->timestamps();

            $table->foreign('userid')->references('userid')->on('penggunas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
