<?php

namespace App\Models;

use CodeIgniter\Model;

class SensorModel extends Model
{
    protected $table            = 'sensores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nome', 'tipo', 'valor', 'status'];

    // --- ADICIONE O CÓDIGO ABAIXO ---

    // Regras de validação
    protected $validationRules = [
        'nome'  => 'required|min_length[3]|max_length[100]',
        'valor' => 'permit_empty|numeric',
        'status' => 'required'
    ];

    // Mensagens de erro personalizadas
    protected $validationMessages = [
        'nome' => [
            'required'   => 'O campo Nome do Sensor é obrigatório.',
            'min_length' => 'O nome do sensor precisa ter pelo menos 3 caracteres.'
        ],
        'valor' => [
            'numeric' => 'O campo Valor precisa ser um número.'
        ]
    ];

    // --- FIM DO CÓDIGO A SER ADICIONADO ---
}