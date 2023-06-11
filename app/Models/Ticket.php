<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'user_id',
        'agent_id',
        'categorie_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }

    public function priorite()
    {
        return $this->belongsTo(Priorite::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function jointures()
    {
        return $this->hasMany(Jointure::class);
    }
    
}
