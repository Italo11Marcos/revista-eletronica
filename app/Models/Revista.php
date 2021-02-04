<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    protected $fillable = ['titulo','volume', 'ano', 'numero', 'capa', 'descricao'];

    public function artigos()
    {
        return $this->hasMany('App\Models\Artigo');
    }

    public function scopeRevista($query)
    {
        return $query->select('id', 'volume', 'numero', 'ano', 'descricao', 'titulo' ,'created_at');
    }
}
