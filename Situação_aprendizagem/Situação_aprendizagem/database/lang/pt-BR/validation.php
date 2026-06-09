<?php

return[

    'custom' => [
        'nome' => [
            'required' => 'O nome é obrigatório',
            'max' => 'O nome deve ter no máximo :max caracteres.'
        ],
        'num_estoque' => [
            'required' => 'O número do estoque é obrigatório.',
            'numeric' => 'O número do estoque deve ser numérico',
            'max' => 'O número do estoque não pode ser maior que :max.'
        ],
        'quantidade' => [
            'required' => 'O campo quantidade é obrigatório',
        ],
        'preco' => [
            'required' => 'O campo preco é obrigatório',
            'numeric' => 'O numero do preço deve ser númerico',

        ],
    ],
    
];
