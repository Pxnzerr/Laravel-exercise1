# Sistema de Gestão de Produtos - Laravel

Sistema de gestão de estoque desenvolvido em Laravel com autenticação de usuários e CRUD completo de produtos.

## 📋 Funcionalidades

- ✅ Autenticação de usuários (registro, login, logout)
- ✅ CRUD completo de produtos
- ✅ Validação de formulários
- ✅ Relatórios de estoque baixo
- ✅ Interface responsiva com Bootstrap

## 🚀 Tecnologias Utilizadas

- **Laravel** 10+
- **MySQL** / SQLite
- **Blade Templates**
- **Bootstrap**
- **Laravel Breeze** (autenticação)

## 📦 Estrutura do Projeto

```
atividade-gestao/
├── app/
│   ├── Http/Controllers/
│   │   ├── ProductController.php
│   │   └── ReportController.php
│   └── Models/
│       └── Product.php
├── database/
│   └── migrations/
│       └── 2025_10_28_000000_create_products_table.php
├── resources/
│   └── views/
│       ├── produtos/
│       ├── reports/
│       └── layouts/
└── routes/
    └── web.php
```

## 🔧 Instalação

1. Clone o repositório
2. Instale as dependências:
   ```bash
   composer install
   ```
3. Configure o arquivo `.env`:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configure o banco de dados no `.env`
5. Execute as migrations:
   ```bash
   php artisan migrate
   ```
6. Inicie o servidor:
   ```bash
   php artisan serve
   ```

## 📝 Campos do Produto

- Nome do produto (string)
- Descrição (text)
- Quantidade em estoque (integer)
- Preço unitário (decimal)

## 🔐 Segurança

- Proteção CSRF em formulários
- Middleware de autenticação em rotas protegidas
- Validação de dados de entrada

## 📊 Recursos Extras

- Relatório de produtos com estoque baixo
- Filtros e buscas
- Layout responsivo

---

**Desenvolvido como atividade de Gestão de Produtos**
