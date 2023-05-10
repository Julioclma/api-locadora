<?php

namespace App\Http\Controllers;

use App\Models\AluguelLivros;
use App\Models\Livros;
use App\Models\RegistroDevolucaoLivro;
use Illuminate\Http\Request;

class RegistroDevolucaoLivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $arr = RegistroDevolucaoLivro::all();

        foreach ($arr as $value) {
            $idsAluguelDevolvidos[] = $value['fk_aluguel'];
        }

        return response()->json(AluguelLivros::whereIn('id', $idsAluguelDevolvidos)->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function registrarDevolucao($id)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $dateToday = date('Y-m-d');

        $check = AluguelLivros::where('id', $id)->update(['devolvido' => 1, 'data_devolvido' => $dateToday]);

        if ($check) {

            $check = RegistroDevolucaoLivro::create(['fk_aluguel' => $id]);


            if ($check) {

                $livroId = AluguelLivros::where('id', $id)->select('fk_livro')->get();

                $livroId = $livroId[0]['fk_livro'];

                $quantity = Livros::findOrFail($livroId)->quantity;

                $quantity++;

                $check = Livros::where('id', $livroId)->update(['quantity' => $quantity]);

                if ($check) {

                    return response()->json(['message' => 'Livro devolvivo com sucesso']);
                }

                return response()->json(['message' => 'Erro ao devolver livro', 'situation' => 3]);
            }

            return response()->json(['message' => 'Erro ao devolver livro', 'situation' => 2]);
        }


        return response()->json(['message' => 'Erro ao devolver livro', 'situation' => 1]);
    }
}
