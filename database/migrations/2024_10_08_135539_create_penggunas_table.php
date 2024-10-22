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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->char('userid')->primary();
            $table->char('nama',255);
            $table->char('email',255);
            $table->char('password',255);
            $table->char('jalan',255);
            $table->char('kota',255);
            $table->char('kecamatan',255);
            $table->char('nomor_telepon',255);
            $table->char('is_admin');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
