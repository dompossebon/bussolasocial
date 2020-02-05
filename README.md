<p align="center"><img src="https://www.bussolasocial.com.br/site/assets/novo/img/logo-horizontal.png" width="400"></p>

<p align="center">
Bússola Social
</p>

# Código Teste

Sistema CRUD feito com Laravel, Html5, CSS, JavaScript, JQuery.

Ps: Melhor não rodar dentro de Xampp ou Lampp. basta seguir este arquivo.

Funciona com servidor próprio do laravel(php artisan serve).



## Começando

Clone o repositório do projeto:

opção 1: 
Caso você use HTTPS:

git clone https://github.com/dompossebon/bussolasocial.git

opção 2:
Caso você use SSH:

git clone git@github.com:dompossebon/bussolasocial.git

---------------------------------------------------------

Após a clonagem, entre no diretório da aplicação: 

cd bussolasocial

em seguida execute o comandos abaixo:

composer install
Caso aconteça erro de permissão, lembre-se de executar: (sudo chown -R $USER .) dentro do diretorio /bussolasocial
e então repita o comando (composer install)

Na raiz do projeto localize e Duplique o arquivo .env.example e em seguida renomeie-o para .env usando o comando:

cp .env.example .env

---------------------------------------------------------

O Trecho de Código dentro do arquivo .env foi deixado para facilitar testes(não deve ficar aqui)

Crie Dois banco de Dados

1- para produção = dbBussolaSocial

2- para testes = dbBussolaSocial_test

IMPORTANTE --- verifique a senha para acesso ao banco = DB_PASSWORD=@@123456

DB_DATABASE=dbBussolaSocial

DB_USERNAME=root

DB_PASSWORD=@@123456

Para que assim o sistema conecte-se ao seu banco e possa criar as devidas tabelas

após ter alterado e estiver testado a sua conexão execute o comando para criar as tabelas

- php artisan migrate:fresh --seed ///este comando vai popular o sistema para utilizar

ja temos dois usuarios com a mesma senha

login = dompossebon@gmail.com

login = angela@gmail.com

senha = 88888888

---------------------------------------------------------


Então rode o comando:

- php artisan key:generate


e em seguida

- php artisan serve

Agora basta

visite http: // http://127.0.0.1:8000/ para ver o aplicativo em ação.


---------------------------------------------------------

Para Rodar Testes rode este comando


## vendor/bin/phpunit


---------------------------------------------------------


## Construído com
Laravel - O framework PHP para artesãos da Web
React - uma biblioteca JavaScript para criar interfaces de usuário

## by Possebon 
## Contato dompossebon@gmail.com

:+1: ## By Possebon

