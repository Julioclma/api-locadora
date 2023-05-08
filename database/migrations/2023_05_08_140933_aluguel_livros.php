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
        Schema::create('aluguel_livros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_livro')->unsigned();
            $table->bigInteger('fk_user')->unsigned();
            $table->timestamps();
            $table->foreign('fk_livro')->references('id')->on('livros');
            $table->foreign('fk_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluguel_livros');
    }
};
