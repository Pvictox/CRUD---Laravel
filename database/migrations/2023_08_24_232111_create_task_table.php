<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
        A criação de tabelas usando Laravel é atraves de 'migrations'
        Para criar um arquivo 'migration' é necessário utilizar a linha de comando do terminal
        Doc: https://laravel.com/docs/10.x/migrations#generating-migrations
    */
    public function up(): void
    {
        Schema::create('task', function (Blueprint $table) { //Basicamente criando uma tabela no DB.
            $table->id();
            $table->string('titulo'); //Coluna do titulo (string == varchar)
            $table->text('desc'); //Coluna da descrição 
            $table->timestamps(); //Colunas 'createdAt', 'updated_at'
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
