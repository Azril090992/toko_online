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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->integer('kode_pembelian')->primary();
            $table->string('kode_produk');
            $table->integer('banyak');
            $table->bigInteger('bayar');
            $table->unsignedBigInteger('id_pembeli');
            $table->string('status');
            $table->foreign('kode_produk')->references('kode')->on('produk')->onDelete('cascade');
            $table->foreign('id_pembeli')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
