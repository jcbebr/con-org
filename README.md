## Sobre

## Instalação

Clone e acesse o repositório
```
git clone https://github.com/jcbebr/con-org.git con-org
cd con-org
```

Instale as dependencias do projeto
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```

Suba os containers através do sail
```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
sail up -d
```

## Documentação
Laravel: https://laravel.com/docs/8.x

Voyager: https://voyager-docs.devdojo.com/