<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jointure extends Model
{
    use HasFactory;

    protected $fillable = [
        'chemin',
        'ticket_id'
    ];
}
