<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function getAllCardapios() {
        $cardapios = Cardapio::get()->toJson(JSON_PRETTY_PRINT);
        return response($cardapios, 200);
    }

    public function createCardapio(Request $request) {
        $cardapio = new Cardapio;
        $cardapio->nome = $request->nome;
        $cardapio->descricao = $request->descricao;
        $cardapio->preco = $request->preco;

        return response()->json([
            "message" => "Cardapio criado com sucesso"
        ], 201);
    }

    public function getCardapio($id) {
        if (Cardapio::where('id', $id)->exists()) {
            $cardapio = Cardapio::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cardapio, 200);
        } else {
            return response()->json([
                "message" => "Cardapio não encontrado"
            ], 404);
        }
    }

    public function deleteCardapio($id){
        if(Cardapio::where('id', $id)->exists()) {
            $cardapio = Cardapio::find($id);
            $cardapio->delete();

            return response()->json([
                "message" => "Cardapio deletado"
            ], 202);
        } else {
            return response()->json([
                "message" => "Cardapio não encontrado"
            ], 404);
        }
    }
}
