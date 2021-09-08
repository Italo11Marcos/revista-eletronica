<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Models\Submissao;

class MailController extends Controller
{
    public function sendCorrecao(Request $request)
    {
        $email = $request->email;
        Mail::send('mail.email-submissao', ['nome' => $request->nome, 'correcao' => $request->correcao, 'email' => $email], function($m) use ($email){
            $m->from('ergaomnes@favenorte.edu.br', 'ErgaOmnes');
            $m->to($email);
            $m->subject('Submissão ErgaOmnes');
        });

        return redirect()->back()->with('success', 'E-mail enviado com sucesso');
    }

    public function sendAprovacao(Request $request)
    {
        $email = $request->email;
        Mail::send('mail.email-aprovacao', ['nome' => $request->nome, 'email' => $email], function($m) use ($email){
            $m->from('ergaomnes@favenorte.edu.br', 'ErgaOmnes');
            $m->to($email);
            $m->subject('Submissão ErgaOmnes');
        });

        return redirect()->back()->with('success', 'E-mail enviado com sucesso');
    }

    public function sendReprovacao(Request $request)
    {
        $email = $request->email;
        Mail::send('mail.email-reprovacao', ['nome' => $request->nome, 'email' => $email], function($m) use ($email){
            $m->from('ergaomnes@favenorte.edu.br', 'ErgaOmnes');
            $m->to($mail);
            $m->subject('Submissão ErgaOmnes');
        });

        return redirect()->back()->with('success', 'E-mail enviado com sucesso');
    }
}
