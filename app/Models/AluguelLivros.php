<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AluguelLivros extends Model
{
    use HasFactory;

    protected $fillable = ['fk_livro','fk_user'];
}
