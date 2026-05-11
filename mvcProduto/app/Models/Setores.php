<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model{

    protected $table = 'setores'; // deixar no plural e em português (tabela vindo como setors)

    protected $fillable = [
        'nome',
        'nCorredor'
    ];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}