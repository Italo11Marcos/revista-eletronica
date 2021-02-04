<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use App\Models\Revista;
use Illuminate\Support\Facades\Storage;

class ArtigoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $revistas = Revista::revista()->get();
        return view('artigo.create', compact('revistas'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'file' => 'required|mimes:pdf|max:1024',
        ]);

        // Handle File Upload
        if($request->hasFile('file')){
            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'.'.$extension;
            // Upload pdf
            $path = $request->file('file')->storeAs('file', $fileNameToStore);
        } else {
            $fileNameToStore = 'nopdf.png';
        }

        $artigo = Artigo::create([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'autor' => $request->autor,
            'pagina' => $request->pagina,
            'key' => $request->key,
            'revista_id' => $request->revista_id,
            'file' => $fileNameToStore,
        ]);

        if($artigo)
            return redirect()->back()->with('success', 'Artigo criado!');
        else
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

    }

    public function list()
    {
        $artigos = Artigo::artigo()->get();

        return view('artigo.list', compact('artigos'));
    }

    public function show($id)
    {
        $artigo = Artigo::find($id);

        $revista = $artigo->revista;

        if(!isset($artigo))
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

        return view('artigo.show', compact('artigo', 'revista'));
    }

    public function edit($id)
    {
        $artigo = Artigo::find($id);

        $revistas = Revista::revista()->get();

        if(!isset($artigo))
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

        return view('artigo.edit', compact('artigo','revistas'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $artigo = Artigo::find($request->id);
        
       // Handle File Upload
       if($request->hasFile('file')){
        // Get filename with the extension
        $filenameWithExt = $request->file('file')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('file')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'.'.$extension;
        //Se tiver pdf, exclui a anterior
        Storage::delete($artigo->file);
        // Upload pdf 
        $path = $request->file('file')->storeAs('file', $fileNameToStore);
        // Se tiver pdf, altera
        $update = $artigo->update([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'autor' => $request->autor,
            'pagina' => $request->pagina,
            'key' => $request->key,
            'revista_id' => $request->revista_id,
            'file' => $fileNameToStore,
        ]);
        } else {
            $update = $artigo->update([
                'titulo' => $request->titulo,
                'resumo' => $request->resumo,
                'autor' => $request->autor,
                'pagina' => $request->pagina,
                'key' => $request->key,
                'revista_id' => $request->revista_id,
            ]);
        }


        if($update)
            return redirect()->route('list-artigo')->with('success', 'artigo atualizada!');
        else
            return redirect()->route('list-artigo')->with('error', 'Eita, algo deu errado!');
    }

    public function delete(Request $request)
    {
        $artigo = Artigo::find($request->id);

        //Se tiver pdf, exclui a anterior
        Storage::delete($artigo->file);

        $artigo->delete();

        if($artigo)
            return redirect()->route('list-artigo')->with('success', 'artigo deletada!');
        else
            return redirect()->route('list-artigo')->with('error', 'Eita, algo deu errado!');

    }
}
