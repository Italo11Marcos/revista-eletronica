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

        Mail::send('mail.email-submissao', ['nome' => $request->nome, 'correcao' => $request->correcao], function($m){
            $m->from('italomarcosboa@gmail.com', 'Ítalo');
            $m->to($request->email);
            $m->subject('ola');
        });

        return redirect()->back()->with('success', 'E-mail enviado com sucesso');
    }

    public function sendAprovacao(Request $request)
    {

        Mail::send('mail.email-aprovacao', ['nome' => $request->nome], function($m){
            $m->from('italomarcosboa@gmail.com', 'Ítalo');
            $m->to($request->email);
            $m->subject('ola');
        });

        return redirect()->back()->with('success', 'E-mail enviado com sucesso');
    }

    public function sendReprovacao(Request $request)
    {

        Mail::send('mail.email-reprovacao', ['nome' => $request->nome], function($m){
            $m->from('italomarcosboa@gmail.com', 'Ítalo');
            $m->to($request->email);
            $m->subject('ola');
        });

        return redirect()->back()->with('success', 'E-mail enviado com sucesso');
    }
}
