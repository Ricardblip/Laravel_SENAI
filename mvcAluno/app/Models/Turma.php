<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model{

    protected $fillable = [
        'numSala',
        'serie'
    ];

    // 🔥 plural (padrão Laravel)
    public function alunos(){
        return $this->hasMany(Aluno::class);
    }
}