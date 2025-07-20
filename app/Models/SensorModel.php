<?php

namespace App\Models;

use CodeIgniter\Model;

class SensorModel extends Model
{
    protected $table            = 'sensores'; // Nome da sua tabela
    protected $primaryKey       = 'id';       // Chave primária da tabela

    protected $useAutoIncrement = true;

    // Campos que podem ser preenchidos pelo usuário
    protected $allowedFields    = ['nome', 'tipo', 'valor', 'status'];

    // Habilita o uso de created_at e updated_at (opcional, mas bom)
    protected $useTimestamps = false; // Sua tabela já tem 'criado_em', então vamos deixar false por enquanto para simplificar.
}