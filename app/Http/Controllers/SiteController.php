<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revista;
use App\Models\Artigo;

class SiteController extends Controller
{
    //
    public function teste()
    {
        $revistas = Revista::all();

        return view('site.teste', compact('revistas'));
    }

    public function revistainfo($id)
    {
        $revista = Revista::find($id);

        $artigos = $revista->artigos;

        if(!$revista)
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

        return view('site.info-revista', compact('revista', 'artigos'));
    }

    public function artigoinfo($id)
    {
        $artigo = Artigo::find($id);

        $revista = $artigo->revista;

        if(!$artigo)
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

        return view('site.info-artigo', compact('revista', 'artigo'));
    }

    public function atual()
    {
        $r = Revista::orderBy('created_at', 'desc')->first();
        return view('site.atual', compact('r'));
    }

    public function anterior()
    {
        $revistas = Revista::orderBy('created_at')->get();
        return view('site.anterior', compact('revistas'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function equipe()
    {
        return view('site.equipe');
    }

    public function contato()
    {
        return view('site.contato');
    }
}
