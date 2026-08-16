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
        Schema::create('hpp', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_produksi');
            $table->string('id_batch');
            $table->unsignedBigInteger('id_bahan');
            $table->integer('modal');
            $table->integer('takaran');

            // $table->foreign('id_produksi')->references('id')->on('produksi');
            $table->foreign('id_bahan')->references('id')->on('bahan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hpp');
    }
};
