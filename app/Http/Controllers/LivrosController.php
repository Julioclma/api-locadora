<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $livros = Livros::all();

        return response()->json($livros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $create = Livros::create($request->all());

        if ($create) {
            return response()->json(['message' => 'Livro criado com sucesso!'], 201);
        }

        return response()->json(['message' => 'Não foi possivel cadastrar o livro!'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Livros $livros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livros $livros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $result = Livros::destroy($id);

        if ($result) {
            return response()->json(['message' => 'Livro deletado com sucesso!'], 200);
        }

        return response()->json(['message' => 'Não foi possivel deletar o livro!'], 404);
    }
}
