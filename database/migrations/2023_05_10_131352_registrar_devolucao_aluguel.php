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
        Schema::create('registro_devolucao_livro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_aluguel')->unsigned();
            $table->timestamps();
            $table->foreign('fk_aluguel')->references('id')->on('aluguel_livros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
