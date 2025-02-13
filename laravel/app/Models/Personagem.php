<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    use HasFactory;

    protected $table = 'personagem'; // Nome da tabela no banco de dados

    protected $fillable = [
        'nome',
        'vida',
        'vidaMax',
        'mana',
        'manaMax',
        'ca',
        'DR',
        'nivel',
        'moedas',
        'xp',
    ];
}
