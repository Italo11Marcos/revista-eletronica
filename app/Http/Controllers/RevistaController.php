<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revista;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class RevistaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        if(Gate::allows('isAdmin')){
            return view('revista.create');
        }

    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'capa' => 'required|mimes:jpeg,bmp,png,jpg|max:1024',
        ]);

        // Handle File Upload
        if($request->hasFile('capa')){
            // Get filename with the extension
            $filenameWithExt = $request->file('capa')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('capa')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('capa')->storeAs('capa', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $revista = Revista::create([
            'titulo' => $request->titulo,
            'volume' => $request->volume,
            'numero' => $request->numero,
            'ano' => $request->ano,
            'descricao' => $request->descricao,
            'capa' => $fileNameToStore,
        ]);

        if($revista)
            return redirect()->back()->with('success', 'Revista criada!');
        else
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

    }

    public function list()
    {
        if(Gate::allows('isAdmin'))
        {
            $revistas = Revista::revista()->get();

            return view('revista.list', compact('revistas'));
        }
        
    }

    public function show($id)
    {
        $revista = Revista::find($id);

        $artigos = $revista->artigos;

        if(!isset($revista))
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

        return view('revista.show', compact('revista','artigos'));
    }

    public function edit($id)
    {
        $revista = Revista::find($id);

        if(!isset($revista))
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

        return view('revista.edit', compact('revista'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $revista = Revista::find($request->id);
        
        if($request->hasFile('capa')){
            // Get filename with the extension
            $filenameWithExt = $request->file('capa')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('capa')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
             //Se tiver imagem, exclui a anterior
            Storage::delete($revista->capa);
            // Upload Image
            $path = $request->file('capa')->storeAs('capa', $fileNameToStore);
            // Se tiver imagem, altera também
            $update = $revista->update([
                'titulo' => $request->titulo,
                'volume' => $request->volume,
                'numero' => $request->numero,
                'ano' => $request->ano,
                'descricao' => $request->descricao,
                'capa' => $request->$fileNameToStore,
            ]);
        } else {
            $update = $revista->update([
                'titulo' => $request->titulo,
                'volume' => $request->volume,
                'numero' => $request->numero,
                'ano' => $request->ano,
                'descricao' => $request->descricao,
            ]);
        }

        if($update)
            return redirect()->back()->with('success', 'Revista atualizada!');
        else
            return redirect()->back()->with('error', 'Eita, algo deu errado!');
    }

    public function delete(Request $request)
    {
        $revista = Revista::find($request->id);

        Storage::delete($revista->capa);

        $revista->delete();

        if($revista)
            return redirect()->route('list-revista')->with('success', 'Revista deletada!');
        else
            return redirect()->route('list-revista')->with('error', 'Eita, algo deu errado!');

    }
}
