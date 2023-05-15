<?php

namespace App\Http\Controllers;

use App\Mail\MailLivroRetirado;
use App\Models\AluguelLivros;
use App\Models\Livros;
use App\Models\Users;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AluguelLivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $livrosAlugados = AluguelLivros::where('devolvido', 0)->get();

        if (count($livrosAlugados) > 0) {
            return response()->json(AluguelLivros::where('devolvido', 0)->orderBy('id', 'desc')->get());
        }

        return response()->json(['Message' => 'Nenhum livro alugado no momento!']);
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

                $user = Users::where('id', $request->fk_user)->get();

                $livro = Livros::where('id', $request->fk_livro)->get();

                 Mail::to($user[0]['email'])->send(new MailLivroRetirado($user[0]['name'], $livro[0]['name'], $request->data_limite_devolucao));


                return response()->json(['message' => 'aluguel registrado com sucesso']);
            }
        }

        return response()->json(['message' => 'Não foi possivel registrar o aluguel']);
    }

    public function livrosAtrasados(): JsonResponse
    {

        $alugadosNaoDevolvidos = AluguelLivros::where('devolvido', 0)->select('id')->get()->toArray();

        $idsNaoDevolvidos = [];

        $idsAtrasados = [];

        foreach ($alugadosNaoDevolvidos as $value) {
            $idsNaoDevolvidos[] = $value['id'];
        }

        $retiradoEmArr = AluguelLivros::whereIn('id', $idsNaoDevolvidos)->select('created_at')->get()->toArray();

        $dataLimiteDevolucaoArr = AluguelLivros::whereIn('id', $idsNaoDevolvidos)->select('data_limite_devolucao')->get()->toArray();

        $retiradoArrNew = [];

        foreach ($retiradoEmArr as $key => $retiradoArr) {
            $retiradoArrNew[] = $retiradoArr['created_at'];
        }

        $dataLimiteDevoArrNew = [];

        foreach ($dataLimiteDevolucaoArr as $key => $dataLimiteArr) {
            $dataLimiteDevoArrNew[] = $dataLimiteArr['data_limite_devolucao'];
        }

        foreach ($idsNaoDevolvidos as $key => $value) {
            date_default_timezone_set('America/Sao_Paulo');

            // $dtTime = new DateTime($retiradoArrNew[$key]);
            $dtTime2 = strtotime(($dataLimiteDevoArrNew[$key]));

            $dateToday = time();

            $interval = $dtTime2 - $dateToday;

            if ($interval <= 0) {
                $idsAtrasados[] = $value;
            }
        }

        $atrasados = AluguelLivros::whereIn('id', $idsAtrasados)->orderBy('id', 'desc')->get();

        if (count($atrasados) > 0) {
            return response()->json($atrasados);
        }

        return response()->json(["Message" => "Nenhum livro em atraso!"]);
    }
}
