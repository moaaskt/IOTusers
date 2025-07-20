<?php

namespace App\Controllers;

use App\Models\SensorModel; // Importa o nosso Model

class Sensores extends BaseController
{
    /**
     * Exibe a lista de todos os sensores.
     */


// Adicione este novo método dentro da classe Sensores
public function create()
{
    helper('url'); // Garante que a função de redirecionamento funcione bem

    $model = new SensorModel();
    $data = $this->request->getPost();

    if ($model->save($data)) {
        // Redireciona para a lista de sensores com uma mensagem de sucesso
        return redirect()->to(site_url('sensores'))->with('success', 'Sensor adicionado com sucesso!');
    } else {
        // Se houver erros, volta para o formulário
        return redirect()->back()->withInput()->with('errors', $model->errors());
    }
}



    // Adicione este novo método dentro da classe Sensores
public function new()
{
    helper('form'); // <<< ADICIONE ESTA LINHA

    // Agora carrega a view com o formulário de criação
    return view('sensores/new', ['title' => 'Adicionar Novo Sensor']);
}




    public function index()
    {
        // 1. Instancia o Model
        $model = new SensorModel();

        // 2. Prepara os dados para a View
        $data = [
            'sensores' => $model->findAll(), // Busca todos os registros na tabela
            'title'    => 'Lista de Sensores',
        ];

        // 3. Carrega a View e passa os dados para ela
        return view('sensores/index', $data);
    }
}