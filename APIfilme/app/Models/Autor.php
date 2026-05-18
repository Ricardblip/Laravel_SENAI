<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
     protected $table = 'Autor';

    protected $fillable = [
        'nome',
        'dataNascimento',
        'email',
        'telefone',
    ];

    public function filmes(){
        return $this->hasMany(Filme::class);
    }
}