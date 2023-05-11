<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiSeriesController extends Controller
{
    public function index(): JsonResponse
    {
        $data = Users::all();

        return response()->json($data, 200);
    }

    public function create(Request $request): JsonResponse
    {

        // $result = Users::firstOrCreate($request->all());
        
        $result = Users::create($request->all());


        if ($result) {
            return response()->json(['message' => 'Usuário criado com sucesso'], 201);
        }

        return response()->json(['message' => 'Usuário Não foi criado!'], 404);
    }

    public function update(Request $request, $id): JsonResponse
    {

        $result = Users::findOrFail($id)->update($request->all());

        if ($result) {
            return response()->json(['message' => 'Usuário atualizado com sucesso'], 201);
        }

        return response()->json(['message' => 'Usuário Não atualizado!'], 404);
    }

    public function show($id): JsonResponse
    {
        $content = Users::findOrFail($id);

        if ($content) {
            return response()->json($content);
        }

        return response()->json(['Message' => 'Usuário não encontrado!']);
    }
    public function destroy($id): JsonResponse
    {

        $result = Users::destroy($id);

        if ($result) {
            return response()->json(['message' => 'Usuário deletado com sucesso'], 201);
        }

        return response()->json(['message' => 'Usuário Não deletado!'], 404);
    }
}
