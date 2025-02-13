<?php

namespace App\Http\Controllers;

use App\Models\Personagem;
use Illuminate\Http\Request;


class PersonagemController extends Controller 
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'vida' => 'integer|min:0',
            'vidaMax' => 'integer|min:0',
            'mana' => 'integer|min:0',
            'manaMax' => 'integer|min:0',
            'ca' => 'integer|min:0',
            'DR' => 'integer|min:0',
            'nivel' => 'integer|min:1',
            'moedas' => 'integer|min:0',
            'xp' => 'integer|min:0',
        ]);

        $personagem = Personagem::create($request->all());
        return response()->json($personagem, 201);
    }
};

