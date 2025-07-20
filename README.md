#  CRUD de Sensores com CodeIgniter 4

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.6.1-orange?style=for-the-badge&logo=codeigniter)
![PHP](https://img.shields.io/badge/PHP-8.3.16-blue?style=for-the-badge&logo=php)

## 📖 Sobre o Projeto

Este é um projeto de estudo desenvolvido para aplicar os conceitos de um sistema **CRUD** (Create, Read, Update, Delete) utilizando o framework PHP **CodeIgniter 4**. A aplicação simula um sistema simples de gerenciamento de sensores, permitindo cadastrar, listar, editar e, futuramente, excluir registros de um banco de dados MySQL.

---

## ✨ Funcionalidades

-   [x] **Listar** todos os sensores cadastrados.
-   [x] **Adicionar** um novo sensor através de um formulário.
-   [x] **Editar** as informações de um sensor existente.
-   [ ] **Excluir** um sensor do banco de dados.

---


## 🚀 Tecnologias Utilizadas

* **Framework:** [CodeIgniter 4](https://codeigniter.com/)
* **Linguagem:** [PHP](https://www.php.net/)
* **Banco de Dados:** MySQL
* **Servidor de Desenvolvimento:** [Laragon](https://laragon.org/)
* **Frontend:** HTML5 e CSS3 (sem frameworks)

---

## ⚙️ Como Executar o Projeto

Siga os passos abaixo para executar o projeto em seu ambiente de desenvolvimento local.

**1. Pré-requisitos:**
* PHP >= 8.1
* Composer
* Um servidor de banco de dados MySQL (XAMPP, WAMP, Laragon, etc.)

**2. Clone o Repositório:**
```bash
git clone [https://github.com/seu-usuario/seu-repositorio.git](https://github.com/seu-usuario/seu-repositorio.git)
cd seu-repositorio
```

**3. Instale as Dependências:**
O CodeIgniter precisa de suas dependências, que são gerenciadas pelo Composer.
```bash
composer install
```

**4. Configure o Ambiente:**
Crie seu arquivo de ambiente a partir do exemplo. É aqui que você configurará a conexão com o banco de dados.
```bash
# No Windows
copy .env.example .env

# No Linux ou macOS
cp .env.example .env
```
Após criar o arquivo `.env`, abra-o e edite as variáveis do banco de dados (`database.default.*`) com as suas credenciais.

**5. Crie o Banco de Dados:**
Acesse seu gerenciador de banco de dados (MySQL Workbench, phpMyAdmin, etc.) e crie um novo banco com o nome que você definiu no `.env` (o padrão é `crud_ci4`).

**6. Crie a Tabela `sensores`:**
Execute o seguinte comando SQL no seu banco de dados para criar a tabela necessária:
```sql
CREATE TABLE sensores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  tipo VARCHAR(50),
  valor DECIMAL(10,2),
  status ENUM('ativo', 'inativo') DEFAULT 'ativo',
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**7. Inicie o Servidor:**
Use o servidor de desenvolvimento embutido do CodeIgniter.
```bash
php spark serve
```
Pronto! Agora você pode acessar a aplicação em **http://localhost:8080** no seu navegador.

---

## 👨‍💻 Autor

Projeto desenvolvido por mim mesmo
