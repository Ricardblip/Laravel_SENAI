<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model{

    protected $fillable = [
        'nomeLivro',
        'autor',
        'descricao',
        'editora_id',
        'detalhe_id'
    ];

    public function editora(){
        return $this->belongsTo(Editora::class);
    }

    public function detalhe(){
        return $this->belongsTo(Detalhe::class, 'detalhe_id');
    }
}