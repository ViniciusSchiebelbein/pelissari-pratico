<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CamposContatoRequest;
use App\Mail\EmailContato;
use Illuminate\Support\Facades\Mail;
use App\Models\Contato;

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
    public function store(CamposContatoRequest $request)
    {
        $request->validated();
        try {
            $contato = new Contato();
            $contato->contato_nome = $request->txtNome;
            $contato->contato_email = $request->txtEmail;
            $contato->contato_telefone = $request->txtTelefone;
            $contato->contato_msgm = $request->txtMensagem;
            $contato->save();
            Mail::to('email@dominio.com')->send(new EmailContato($contato));
            return back()->with(
                [
                    'status' => 'Mensagem enviada com sucesso!',
                    'class' => 'success',
                    'icon' => 'bi-check2-all'
                ]
            );
        } catch (\Throwable $th) {
            return back()->with(
                [
                    'status' => 'Ocorreu um erro ao enviar a sua mensagem',
                    'class' => 'danger',
                    'icon' => 'bi-exclamation-circle'
                ]
            );
        }
    }
}
