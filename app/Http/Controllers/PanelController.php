<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use App\Models\Revista;
use App\Models\Submissao;
use App\User;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $countArtigo = Artigo::count();
        $countRevista = Revista::count();
        $countUser = User::count();
        $countSubAprovado = Submissao::where('status', 'aprovado')->count();
        $countSubReprovado = Submissao::where('status', 'reprovado')->count();
        $countSub = Submissao::count();
        return view('panel.index', compact('countArtigo','countRevista','countUser','countSubAprovado','countSubReprovado','countSub'));
    }
}
