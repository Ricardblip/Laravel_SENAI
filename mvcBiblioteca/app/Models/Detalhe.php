<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalhe extends Model{

    protected $table = 'detalhe';

    protected $fillable = [
        'custo',
        'preco_venda',
        'imposto'
    ];

    public function livros(){
        return $this->hasMany(Livro::class);
    }
}