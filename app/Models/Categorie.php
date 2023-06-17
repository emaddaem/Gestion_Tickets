<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'entreprise_id'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    
}
