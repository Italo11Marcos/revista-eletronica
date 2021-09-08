<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submissao;
use App\Models\Artigo;
use App\Models\Revista;
use App\User;
use App\Notifications\NotificarSubmissaoUser;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class SubmissaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('submissao.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx|max:1024',
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
            $date = date('d-m-Y-H-i');
            $fileNameToStore= $filename.$date.'.'.$extension;
            //$fileNameToStore= $filename.'.'.$extension;
            // Upload pdf
            $path = $request->file('file')->storeAs('file', $fileNameToStore);
        } else {
            $fileNameToStore = 'nopdf.png';
        }
        
        $submissao = Submissao::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'resumo' => $request->resumo,
            'key' => $request->key,
            'comentario' => $request->comentario,
            'file' => $fileNameToStore,
            'user_id' => $request->user_id,
        ]);

        $user = User::find(Auth::id());

        if($submissao){
            Notification::send($user, new NotificarSubmissaoUser());
            return redirect()->back()->with('success','Submissão enviada com sucesso');
        }
        else
            return redirect()->back()->with('error','Eita, tivemos algum problema');
    }

    public function list()
    {
        $submissoes = Submissao::all()->where('status', 'pendente');

        return view('submissao.list', compact('submissoes'));
    }

    public function aprovado()
    {
        $submissoes = Submissao::all()->where('status','aprovado');

        return view('submissao.aprovado', compact('submissoes'));
    }

    public function reprovado()
    {
        $submissoes = Submissao::all()->where('status','reprovado');

        return view('submissao.reprovado', compact('submissoes'));
    }

    public function correcao()
    {
        $submissoes = Submissao::all()->where('status','correcao');

        return view('submissao.correcao', compact('submissoes'));
    }

    public function show($id)
    {
        $submissao = Submissao::find($id);

        if(!isset($submissao))
            return redirect()->back()->with('error', 'Eita, algo deu errado!');

        return view('submissao.show', compact('submissao'));
    }

    public function update(Request $request)
    {
        //dd($request->all());

        $submissao = Submissao::find($request->id);
        
        if(isset($request->correcao)){
            $update = $submissao->update([
                'correcao' => $request->correcao,
                'status' => 'correcao'
            ]);
    
            if($update)
                return redirect()->route('correcao-submissao')->with('success', 'Submissão corrigida!');
            else
                return redirect()->route('correcao-submissao')->with('error', 'Eita, tivemos algum problema');
        }
        
            
        if($request->status === 'aprovado'){
            $update = $submissao->update([
                'status' => 'aprovado',
            ]);

            if($update)
                return redirect()->route('aprovado-submissao')->with('success', 'Submissão aprovada!');
            else
                return redirect()->route('aprovado-submissao')->with('error', 'Eita, tivemos algum problema');
        }

        if($request->status === 'reprovado'){
            $update = $submissao->update([
                'status' => 'reprovado',
            ]);

            if($update)
                return redirect()->route('reprovado-submissao')->with('success', 'Submissão reprovada!');
            else
                return redirect()->route('reprovado-submissao')->with('error', 'Eita, tivemos algum problema');
        }    

        
    }

    public function vincular($id)
    {
        //dd($request->all());
        $submissao = Submissao::find($id);
        
        if(!$submissao)
            return redirect()->back()->with('error', 'Eita, não achamos essa submissão');

        $revistas = Revista::all();
        
        return view('submissao.vinculacao', compact('submissao','revistas'));
    }

    public function storeVincular(Request $request)
    {
        //dd($request->all());

        $submissao = Artigo::create([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'autor' => $request->autor,
            'pagina' => $request->pagina,
            'key' => $request->key,
            'revista_id' => $request->revista_id,
            'file' => $request->file,
        ]);

        if($submissao)
            return redirect()->route('list-artigo')->with('success','Vinculação realizada');
        else
            return redirect()->back()->with('error', 'Eita, tivemos um problema');

    }
}
