<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('url');
            $table->foreignId('kategori_id')->constrained('tbl_kategori_dokumen')->onDelete('cascade');
            $table->foreignId('pengguna_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_dokumen');
    }
};
