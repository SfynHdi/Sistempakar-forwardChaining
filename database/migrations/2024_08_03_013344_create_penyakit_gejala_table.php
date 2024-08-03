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
        Schema::create('penyakit_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyakit_id')->notNull()->references('id')->on('penyakit')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('gejala_id')->notNull()->references('id')->on('gejala')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyakit_gejala');
    }
};
