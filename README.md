
# 🌸 Sistema Interno de Floricultura

Este é um sistema de gerenciamento para uma floricultura, desenvolvido com **Laravel**. Ele permite o controle de produtos, fornecedores, vendas e entregas com base no perfil de usuário (Administrador, Funcionário ou Entregador).

---

## 📝 Descrição do Projeto

O sistema visa atender as necessidades internas de uma floricultura, oferecendo funcionalidades como:

- Gestão de produtos com upload de imagens.
- Controle de fornecedores e estoques.
- Registro de vendas associadas a responsável.
- Acompanhamento de entregas com confirmação e relatórios de problemas.
- Acesso personalizado por tipo de usuário.
- Geração de relatórios em PDF.

---

## 🚀 Instruções de Execução

1. Clone o repositório:
   bash
   git clone https://github.com/seu-usuario/nome-do-projeto.git
   cd nome-do-projeto
   
2. Instale as dependências:
   
   composer install
   npm install && npm run build

3. Configure o `.env` com suas e gere a chave:

   cp .env.example .env
   php artisan key:generate

4. Execute as migrações e seeders:

   php artisan migrate:fresh --seed

5. Crie o link simbólico para as imagens:

   php artisan storage:link

6. Inicie o servidor:

   php artisan serve

---

## ⚙️ Tecnologias Utilizadas

- **Laravel**
- **Laravel Breeze** (autenticação)
- **Blade + Bootstrap** (frontend)
- **MySQL** (banco de dados)
- **DomPDF** (geração de relatórios PDF)
- **PHP**

---

## 🧭 Organização dos Casos de Uso

### - Gerenciar Produtos
- Administradores e funcionários podem cadastrar, editar, visualizar e excluir produtos.
- Inclui upload de imagem e controle de estoque.

### - Gerenciar Fornecedores
- Apenas administradores podem gerenciar os fornecedores.

### - Registrar Venda
- Funcionários e administradores podem registrar vendas com múltiplos produtos.
- Calcula total e associa o responsável.

### - Gerar Relatório de Vendas (PDF)
- Administradores geram relatórios PDF com filtro por datas, totais e produtos vendidos.

### - Gerenciar Entregas
- Admins e funcionários podem cadastrar e atualizar.
- Entregadores confirmam ou relatam problemas.

### - Acesso por Perfil de Usuário
- Sistema segmentado por:
  - **Administrador**: acesso completo.
  - **Funcionário**: produtos, vendas e entregas.
  - **Entregador**: visualização de entregas e ações específicas.

---

## 🧩 Modelagem 

### Entidades 
- Produto
- Fornecedor
- Venda
- Entrega
- Usuário

### ✅ Relacionamentos

| Tipo        | Descrição                                                                            |
|-------------|--------------------------------------------------------------------------------------|
| 1:N         | Um fornecedor possui vários produtos                                                 |
| 1:N         | Uma venda pode gerar uma entrega                                                     |
| N:N         | Uma venda pode conter vários produtos (com quantidade e preço unitário)              |
| 1:1         | Uma entrega é atribuída a um único entregador                                        |

---

## 🎨 Layout e Estilo

- Interface baseada em **Bootstrap**
- Uso de `<x-app-layout>` com cabeçalhos dinâmicos
- Diferenciação visual por tipo de usuário
- Página inicial e login customizados

---

## 👤 Usuários de Teste (via seed)

| Tipo         | Email                        | Senha        |
|--------------|------------------------------|--------------|
| Admin        | admin@flowerhouse.com        | admin123     |
| Funcionário  | funcionario@flowerhouse.com  | func123      |
| Entregador   | entregador@flowerhouse.com   | entregador123|

