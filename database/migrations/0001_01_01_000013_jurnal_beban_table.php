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
        Schema::create('log_beban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode');
            $table->date('periode');
            $table->decimal('jumlah', 15, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->foreign('kode')->references('kode')->on('akun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
