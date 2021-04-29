<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Submissao extends Model
{
    use Notifiable;

    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->email_address;

    }

    protected $fillable = ['titulo','autor','resumo','key','comentario','file','user_id','status', 'correcao'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
