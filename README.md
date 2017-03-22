# die-slim #
Basic structure for a Slim Framework project

### Arquivos e diretórios necessários? ###

* app ( Diretório com arquivos de configuração do projeto )
* public ( Diretório públic do projeto - FrontController )
* src ( Diretório de códigos do Projeto )
* .gitignore 
* .htaccess
* composer.json 
* composer.phar

### Como configurar? ###

* Após clonar o projeto é necessário instalar as dependências do composer:
  ##### php composer.phar install #####
  Isso irá criar o diretorio vendor 
  
* Crie as pasta 'log' e 'cache' na raiz do projeto e de permissões para leitura e escrita às mesmas.
* Altere as configurações necessárias no arquivo app/setings.php e app/setings_dev.php
* Para subir para âmbientes de produção altere o arquivo .htaccess da pasta public na linha 22 para apontar para o app.php

### Duvidas ###
* Autor Diefferson Santos 
* E-mail diefferson.sts@gmail.com
