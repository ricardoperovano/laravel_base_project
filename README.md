<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Projeto Base em Laravel

Esse projeto é um projeto para começar o desenvolvimento com laravel. Possui as seguintes caracteristicas

-   Autenticação está configurada
-   Requests configuradas nos controllers
-   Componente de permissões configuradas
-   Componente de Documentação de api configurado
-   Configurado para utilzar Repository Pattern

## Instalação

### Acesse o diretorio raiz do projeto para iniciar a configuração e instalação

#### 1 - Crie o arquivo .env e configure o banco de dados

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=banco
DB_USERNAME=usuario
DB_PASSWORD=senha_do_banco
```

#### 2 - Gere uma chave privada para aplicação

```
php artisan key:generate
```

#### 2 - Instalação das dependencias

```
composer install
```

#### 3 - Gere uma chave privada para ser utilizada nos tokens de autenticação

```
php artisan jwt:secret
```

#### 4 - Execute as migrations

```
php artisan migrate
```

#### 5 - Execute o seeder para popular o banco com as informações iniciais

```
php artisan db:seed

Usuário padrão: admin@localhost.com
Senha: Laravel@2020!
```

#### 6 - Testando a aplicação

```
php artisan serve
```

## Documentação

Para verificar as rotas disponíveis acesse a documentação [documentação](http://localhost:8000/doc).

## Vulnerabilidades de Segurança

Se você encontrar alguma vulnerabilidade que prejudique a segurança da aplicação, por favor, envie um email para [ricardoperovano@gmail.com](mailto:ricardoperovano@gmail.com). Todas as vulnerabilidades serão prontamente atendidas.

## License

The MIT License (MIT). Please see License File for more information.
