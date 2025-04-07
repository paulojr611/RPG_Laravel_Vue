<?php

namespace App\Http\Controllers;

use App\Models\Personagem;
use Illuminate\Http\Request;

class PersonagemController extends Controller 
{
    /**
     * Retorna todos os personagens.
     */
    public function index()
    {
        return response()->json(Personagem::all(), 200);
    }

    // Cria um novo personagem.

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

        return response()->json([
            'message' => 'Personagem criado com sucesso!',
            'personagem' => $personagem
        ], 201);
    }

    /**
     * Retorna um personagem específico.
     */
    public function show($id)
    {
        $personagem = Personagem::find($id);

        if (!$personagem) {
            return response()->json(['message' => 'Personagem não encontrado'], 404);
        }

        return response()->json($personagem, 200);
    }

    /**
     * Atualiza um personagem.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'string|max:255',
            'vida' => 'integer|min:0',
            'vidaMax' => 'integer|min:1',
            'mana' => 'integer|min:0',
            'manaMax' => 'integer|min:1',
            'ca' => 'integer|min:0',
            'DR' => 'integer|min:0',
            'nivel' => 'integer|min:1',
            'moedas' => 'integer|min:0',
            'xp' => 'integer|min:0',
        ]);

        $personagem = Personagem::find($id);

        if (!$personagem) {
            return response()->json(['message' => 'Personagem não encontrado'], 404);
        }

        $personagem->update($request->all());

        return response()->json([
            'message' => 'Personagem atualizado com sucesso!',
            'personagem' => $personagem
        ], 200);
    }

    /**
     * Deleta um personagem.    
     */
    public function destroy($id)
    {
        $personagem = Personagem::find($id);

        if (!$personagem) {
            return response()->json(['message' => 'Personagem não encontrado'], 404);
        }

        $personagem->delete();

        return response()->json(['message' => 'Personagem deletado com sucesso!'], 200);
    }
}
