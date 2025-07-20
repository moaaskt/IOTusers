<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nome', 'email', 'senha_hash'];

    protected $useTimestamps    = true;
    protected $createdField     = 'criado_em';
    protected $updatedField     = ''; // Não vamos usar campo de update

    // Callback para hashear a senha antes de inserir
    protected $beforeInsert     = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['senha_hash'])) {
            $data['data']['senha_hash'] = password_hash($data['data']['senha_hash'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}