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
        Schema::create('notifications', function (Blueprint $table) {
            $table->char('id_notif',255)->primary();
            $table->char('userid',255);
            $table->char('notifikasi',255);
            $table->char('objek',255);
            $table->char('nama_user',255);
            $table->timestamps();

            $table->foreign('userid')->references('userid')->on('penggunas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
