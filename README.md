# Teste RHS
---

## Instalação:
- Após clonar o projeto, rodar `composer install` para instalar os pacotes
- Copiar `.env.example` para `.env` 
- Executar `php artisan key:generate` para gerar a chave da aplicação
- Preencher as variáveis `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` com os dados correspondentes ao do seu banco de dados (Sendo ele um MySQL)
- Executar `php artisan migrate:fresh --seed` para criar as tabelas e popular alguns registros para testar a aplicação (Possui apenas registros de categorias, os filmes devem ser criados a mão)
- --
## Comandos:

### Categoria:
- `php artisan category:search {?category}` possui o parâmetro de busca opcional, caso não seja informado, ele busca todas as categorias, caso seja informado, faz a busca pela categoria que foi informada.
- `php artisan category:create {category}` cria uma categoria.
- `php artisan category:remove {id}` Remove uma categoria.
---
### Filmes:
- `php artisan movie:search_name {?name}` possui o parâmetro de busca opcional, caso não seja informado, ele busca todos os filmes, caso seja informado, faz a busca pelo nome/título que foi informado.
- `php artisan movie:search_category {?category}` possui o parâmetro de busca opcional, caso não seja informado, ele busca todos as filmes, caso seja informado, faz a busca pela categoria que foi informada.
- `php artisan movie:create {title} {categories*}` Cria um filme e atribui categorias ao mesmo.
- `php artisan movie:remove {id}` Remove um filme.
