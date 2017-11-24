<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginaController extends Controller
{
    public function sobre()
    {

        $pagina = Pagina::where('tipo', '=', 'sobre')->first();

        return view('site.sobre', compact('pagina'));

    }

    public function contato()
    {

        $pagina = Pagina::where('tipo', '=', 'contato')->first();

        return view('site.contato', compact('pagina'));

    }

    public function enviarContato(Request $request)
    {

        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        $email  = $pagina->email;

        \Mail::send('emails.contato', ['request' => $request], function($message) use ($request, $email){

            $message->from($request['email'], $request['nome']);
            $message->replyTo($request['email'], $request['nome']);
            $message->to($email, 'Contato do Site');
            $message->subject('Contato Sistema Imobiliária');

        });

        \Session::flash('mensagem', ['msg' => 'Email enviado com Sucesso!', 'class' => 'green white-text']);
        return redirect()->route('site.contato');

    }
}
