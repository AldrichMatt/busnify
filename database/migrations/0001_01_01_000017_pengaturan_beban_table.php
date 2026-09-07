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
        Schema::create('pengaturan_beban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode')->unique();
            $table->unsignedBigInteger("jenis");
            $table->enum('kategori', ['master', 'produksi', 'resell']);

            $table->foreign('kode')->references('kode')->on('akun')->cascadeOnUpdate();
            $table->foreign('jenis')->references('id')->on('jenis_beban')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
