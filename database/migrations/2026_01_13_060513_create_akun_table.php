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
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode')->unique();
            $table->string('nama');
            $table->enum('kategori', ['aset','beban','utang','modal','pendapatan']);
            $table->integer('debit')->default(0);
            $table->integer('kredit')->default(0);
            $table->boolean('aktif')->default(1);
            $table->softDeletes('deleted_at', precision:0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
