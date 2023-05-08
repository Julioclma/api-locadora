<?php

namespace App\Http\Controllers;

use App\Models\AluguelLivros;
use App\Models\Livros;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AluguelLivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(AluguelLivros::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {

        $quantity = Livros::findOrFail($request->fk_livro)->quantity;

        $quantity--;

        if ($quantity >= 0) {

            $create = AluguelLivros::create($request->all());

            if ($create) {

                Livros::findOrFail($request->fk_livro)->update(['quantity' => $quantity]);

                return response()->json(['message' => 'aluguel registrado com sucesso']);
            }
        }

        return response()->json(['message' => 'Não foi possivel registrar o aluguel']);
    }

    /**
     * Display the specified resource.
     */
    public function show(AluguelLivros $aluguelLivros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AluguelLivros $aluguelLivros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AluguelLivros $aluguelLivros)
    {
        //
    }
}
