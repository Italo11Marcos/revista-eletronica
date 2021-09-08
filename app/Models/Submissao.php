<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Submissao extends Model
{
    protected $fillable = ['titulo','autor','resumo','key','comentario','file','user_id','status', 'correcao'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
