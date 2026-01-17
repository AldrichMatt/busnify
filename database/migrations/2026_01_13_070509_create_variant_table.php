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
        Schema::create('variant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_variant')->unique();
            $table->string('nama');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_menu')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant');
    }
};
