<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDevolucaoLivro extends Model
{
    use HasFactory;

    protected $table = "registro_devolucao_livro";
    protected $fillable = ['fk_aluguel'];
}
