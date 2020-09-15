Sistema de cadastro de pessoas e seus respectivos endereços
---
#Tecnologias
 * Banco de dados Mysql.
 * PHP 7.2 ou superior.
 * Laravel 7.24 ou superior.
 * Bootstrap 4.1.
 
#Passos

1 º Baixar o zip do projeto e depois descompactar, ou clonar o projeto a partir da url

2º Configurar o arquivo .env de acordo com os dados do seu banco de dados.

3 º Executar o comando:
~~~composer
	composer install
~~~

4º Gerar a chave da aplicação
~~~text
	php artisan key:generate
~~~

5º Executar as migrations para criar as tabelas:
~~~text
	php artisan migrate
~~~

6º Iniciar o servidor:
~~~text
	php artisan serve 
~~~

Acessar o link do servidor local (http://localhost:8000) 
