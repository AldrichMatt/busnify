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
        Schema::create('jurnal_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_batch')->nullable();
            $table->morphs('item');
            $table->integer('jumlah');
            $table->enum('arah',['masuk', 'keluar']);
            $table->enum('sumber',['penjualan', 'produksi', 'pembelian', 'waste']);
            $table->softDeletes('deleted_at', precision:0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->foreign('id_batch')->references('id')->on('produksi');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
