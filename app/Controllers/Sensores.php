<?php

namespace App\Controllers;

use App\Models\SensorModel; // Importa o nosso Model

class Sensores extends BaseController
{

     public function __construct()
    {
        // Carrega os helpers para todos os métodos deste controller
        helper(['form', 'url']);
    }

    /**
     * Exibe a lista de todos os sensores.
     */



    public function update($id = null)
    {
        $model = new SensorModel();
        helper('url');

        // Pega todos os dados que foram enviados pelo formulário de edição
        $data = $this->request->getPost();

        // O método update() do Model precisa do ID do registro e do array com os novos dados
        if ($model->update($id, $data)) {
            // Se a atualização for bem-sucedida, redireciona para a lista com uma mensagem
            return redirect()->to(site_url('sensores'))->with('success', 'Sensor atualizado com sucesso!');
        } else {
            // Se houver erros (ex: validação), volta para a página anterior
            return redirect()->back()->withInput()->with('errors', 'Houve um erro ao atualizar.');
        }
    }



    public function edit($id = null)
    {
        $model = new SensorModel();
        helper('form');

        // Busca o sensor no banco de dados pelo ID
        $data['sensor'] = $model->find($id);

        if (empty($data['sensor'])) {
            // Se não encontrar o sensor, mostra um erro 404 apropriado
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Sensor não encontrado com o ID: ' . $id);
        }

        $data['title'] = 'Editar Sensor: ' . esc($data['sensor']['nome']);

        // Carrega a view de edição, passando os dados do sensor para ela
        return view('sensores/edit', $data);
    }





    // classe para exibir a lista de sensores
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
    $model = new SensorModel();

    $data = [
        // O paginate() substitui o findAll(). O número 10 indica 10 itens por página.
        'sensores' => $model->paginate(10), 

        // O pager cria os links da paginação (1, 2, 3...)
        'pager'    => $model->pager,

        'title'    => 'Lista de Sensores',
    ];

    return view('sensores/index', $data);
}

    public function delete($id = null)
    {
        $model = new SensorModel();
        helper('url');

        if ($model->delete($id)) {
            return redirect()->to(site_url('sensores'))->with('success', 'Sensor excluído com sucesso!');
        } else {
            return redirect()->to(site_url('sensores'))->with('error', 'Erro ao excluir o sensor.');
        }
    }
}