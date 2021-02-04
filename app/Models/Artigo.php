<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $fillable = ['titulo', 'resumo', 'file', 'autor', 'key', 'pagina','revista_id'];

    public function revista()
    {
        return $this->belongsTo('App\Models\Revista');
    }

    public function scopeArtigo($query)
    {
        return $query->select('id', 'titulo', 'autor', 'key');
    }
}
