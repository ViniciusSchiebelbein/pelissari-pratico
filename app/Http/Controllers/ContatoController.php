<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Exibe formulário para contato.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('formulario-contato');
    }

    /**
     * Salvar contato.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
}
