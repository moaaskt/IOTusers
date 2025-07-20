<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    // Mostra o formulário de login
    public function login()
    {
        helper('form');
        return view('auth/login', ['title' => 'Login']);
    }

    // Processa a tentativa de login
    public function attemptLogin()
    {
        helper(['form', 'url']);
        $model = new UsuarioModel();

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        // Validação simples
        if (empty($email) || empty($senha)) {
            return redirect()->back()->with('error', 'Email e senha são obrigatórios.');
        }

        // Busca o usuário pelo email
        $usuario = $model->where('email', $email)->first();

        // Verifica se o usuário existe e se a senha está correta
        if ($usuario && password_verify($senha, $usuario['senha_hash'])) {
            // Se tudo estiver certo, cria a sessão
            $session = session();
            $sessionData = [
                'usuario_id' => $usuario['id'],
                'nome'       => $usuario['nome'],
                'email'      => $usuario['email'],
                'isLoggedIn' => TRUE
            ];
            $session->set($sessionData);

            // Redireciona para a página de sensores
            return redirect()->to(site_url('sensores'));
        } else {
            // Se falhar, volta para o login com uma mensagem de erro
            return redirect()->back()->with('error', 'Email ou senha inválidos.');
        }
    }

    // Faz o logout do usuário
    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('/'));
    }
}