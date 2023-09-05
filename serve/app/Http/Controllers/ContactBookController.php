<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class ContactBookController extends Controller
{
    public function index()
    {
        try {
            // retornar todos os contatos, se não tiver nenhum retornar vazio e tratar no front
            return view('pages.home.index');
        } catch (Exception $error) {
        }
    }
}
