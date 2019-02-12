# Teste Web - Brasil 317


## Requisitos
- [MySQL](https://www.mysql.com/).
- [Composer](https://getcomposer.org/).

### Configuração
Todas as configurações necessárias são feitas do arquivo ".env", localizado na raíz do projeto. 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

## Instalação
- Instalar as dependências via composer: `composer install`
- Gerar Key: `php artisan key:generate`
- Executar as migrations: `php artisan migrate`
- Executar seeds: `php artisan db:seed`

## Login
Para teste é inserido um usuário no banco de dados:
Email: admin@email.com
Senha: secret

## Testes
- Executar todos os testes: `.\vendor\bin\phpunit`
