<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        if(!$user)
            return redirect()->back()->with('error', 'Não encontramos o usuário');

        return view('user.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        if(!$user)
            return redirect()->back()->with('error', 'Não encontramos o usuário');

        if($request->role == $user->role)
            return redirect()->back()->with('error', 'O usuário já possui essa permissão');
        
        $update = $user->update([
            'role' => $request->role,
        ]);

        if($update)
            return redirect()->route('index-usuario')->with('success', 'Permissão atualizada');
        else
            return redirect()->route('index-usuario')->with('error', 'Eita, alguma coisa deu errado');
    }
}
