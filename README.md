#### Versão da imagem do Nginx
    1.23.3

#### Versão do Laravel
    9.x

#### Versão do PHP
    8.2.1

#### Extensões do PHP
    php8.2-fpm
    php8.2-mbstring
    php8.2-soap
    php8.2-gd
    php8.2-xml
    php8.2-intl
    php8.2-dev
    php8.2-curl
    php8.2-zip
    php8.2-imagick
    php8.2-gmp
    php8.2-ldap
    php8.2-bcmath
    php8.2-bz2
    php8.2-phar
    php8.2-mysql
    php8.2-sqlite3
    php8.2-sqlsrv
    php8.2-pdo_sqlsrv

#### Pasta Raiz
    /laravel

### Rodando o Projeto

#### Acesse a pasta do projeto
    $ cd laravel-livewire

#### Crie uma nova rede do docker chamada proxy
    $ docker network create proxy

#### Faça uma cópia do docker-compose.example.yml com o nome docker-compose.yml
    $ cp docker-compose.example.yml docker-compose.yml

#### Use a stack docker-compose.yml para iniciar um traefik como proxy reverso, um webserver e um sql server
    $ docker-compose -f docker-compose.yml up -d

#### Acesse o container do webserver
    $ docker exec -it livewire

#### Instale/Atualize as dependências
    # composer update

#### Faça uma cópia do arquivo .env.example com o nome .env e gere uma nova chave
    # cp .env.example .env
    # php artisan key:generate

#### Faça o ajuste nas permissões de algumas pastas
    # chgrp -R www-data storage bootstrap/cache
    # chmod -R ug+rwx storage bootstrap/cache

#### Edite o arquivo .env com as informações do seu banco de dados

#### Rode as migrations e seeders
    # php artisan migrate
    # php artisan db:seed

#### Saia do container
    # exit