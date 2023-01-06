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

