# Package on Laravel 9

Vejamos a criação, a publicação no Packagist.org e a instalação e publicação do pacote num aplicativo Laravel.

## Cenário/Planejamento

Vamos criar um pequeno pacote, que basicamente tem um command que ao ser executado mostra a mensagem "Hello World"

## Criação

Aqui estou oferecendo duas formas de criação do pacote:

- From scratch. Para isso veja o exemplo Inspire
- Usando o gerador online

Usarei o gerador que me entrega a estrutura básica pronta

## Criando a estrutura básica

Para isso acesso o gerador em

https://laravelpackageboilerplate.com/

Rolo um pouco a tela e preencho o formulário com os dados do pacote que desejo:

Ele já vem com pacote Laravel selecionado por default.

Preenchendo o form. Adapte para seus dados

Vendor Name - ribafs
Package Name - hello-world
Author Name - Ribamar FS
Author E-Mail - ribafs@gmail.com
Package Description - Pequeno pacote para a criação de pacotes para o Laravel 9

Então clico em "Download my package" e salvo o pacote.

Com isso ele me gera a estrutura básica de um pacote laravel, já com o 

composer.json
src/ViewMaker.php
src/ViewMakerFacade.php
src/ViewMakerServiceProvider.php
README.md
E outros

Então descompacto em alguma pasta.

## Customizando a estrutura básica

### Criar o comando helloWorld

cd packagesLaravel

php artisan make:command helloWorld

Será criado em

app/Console/Commands

nano helloWorld.php

Edite e deixe assim:
```php
<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class helloWorld extends Command
{
    protected $signature = 'hello:world';

    protected $description = 'Pequeno comando para demonstração sobre a criação de comandos no laravel 9';

    public function handle()
    {
        return $this->info(PHP_EOL.'Olá Mundo dos pacotes no Laravel 9 '.PHP_EOL);
    }
}
```

### Executar o comando criado

php artisan hello:world

Agora iremos adicionar este pequeno comando ao nosso pacote

Criar a pasta

src/Commands

Então copiamos

app/Console/Commands/helloWorld.php para a pasta src/Commands do pacote

### Adicionando o comando ao Service Provider

Edite no pacote hello-world

src/HelloWorldServiceProvider.php

O método boot()
```php
    public function boot()
    {
            ...

            // Publishing the command.
            $this->publishes([
                __DIR__.'/Commands' => app_path('Console/Commands'),
            ], 'commands');
...
```

Isso fará com que após a instalação deste pacote, ao publicar ele faça uma cópia do comando helloWorld da pasta do pacote para a respectiva pasta do aplicativo.

## Sobre o Service Provider

Veja que o ServiceProvider é a peça principal de um package laravel. Em nosso caso, ao criar o pacote com um gerador, já recebemos com algum código comentado, onde no método boot() podemos copiar arquivos do pacote para o aplicativo. Basta descomentar o código comentado e adaptar, como eu fiz.

## Publicando nosso pacote no Packagist.org

- Hospedar no Github

Mudei o composer.json para que fique mais coerente:

    "name": "ribafs/hello-world-package-laravel",

E hospedei no Github


