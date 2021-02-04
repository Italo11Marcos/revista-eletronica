<h1>Revista Eletrônica</h1>

<p align="center">
  <img src="https://img.shields.io/static/v1?label=Laravel&message=5.8&color=ff2d20&style=for-the-badge&logo=laravel"/>
  <img src="https://img.shields.io/static/v1?label=PHP&message=7.x&color=777BB4&style=for-the-badge&logo=PHP"/>
  <img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
  <img src="http://img.shields.io/static/v1?label=STATUS&message=CONCLUIDO&color=green&style=for-the-badge"/>
</p>


### :checkered_flag: Tópicos 

:pushpin: [Descrição do projeto](#descrição-do-projeto)

:pushpin: [Funcionalidades](#funcionalidades)

:pushpin: [Deploy da Aplicação](#deploy-da-aplicação)

:pushpin: [Pré-requisitos](#pré-requisitos)

:pushpin: [Como rodar a aplicação](#como-rodar-a-aplicação)

## Descrição do Projeto
<p align="justify">
  Aplicação WEB desenvolvida em Laravel 5.8. Tem como objetivo ser um portal de revista eletrônica. 
</p>

## Funcionalidades
:white_check_mark: Autenticação e ACL
:white_check_mark: Submissão de artigos
:white_check_mark: Envio de E-mails

## Deploy da Aplicação
O projeto está no ar como [Revista ErgaOmnes](http://revistaergaomnes.com.br/).

## Pré Requisitos
* [Laravel 5.8](https://laravel.com/docs/5.8)
* [PHP >= 7.1.3](https://www.php.net/downloads.php)

## Como rodar a aplicação
```
* git clone https://github.com/Italo11Marcos/revista-eletronica.git
* Instale as dependências
    * composer install --no-scripts
* Copie o arquivo .env.example
    * Se estiver utilizando linux: cp .env.example .env
    * Se estiver no windows abra o arquivo em um editor de código e o salve novamente como .env
* Configure sua conexão no banco de dados no arquivo .env
* Rode as Migrations 
    * php artisan migrate
```

## Pacotes e bibliotecas utilizadas
* [Bootstrap 4.5](https://getbootstrap.com/docs/4.5/getting-started/introduction/)
* [JQuery 3.5.1](https://jquery.com/)
* [Font Awesome](https://fontawesome.com/)
* [AdminLTE 3](https://adminlte.io/docs/3.0/)

## Licença 

The [MIT License]() (MIT)

