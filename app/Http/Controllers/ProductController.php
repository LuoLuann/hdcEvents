<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function produtos() {
        
        //para buscar um produto por nome
        $busca = request("search");

        return view('produtos.produtos', ['busca'=> $busca]);
    }
    public function produto($id = null) {
        return view('produtos.produto', ['id' => $id]);
    }
}
