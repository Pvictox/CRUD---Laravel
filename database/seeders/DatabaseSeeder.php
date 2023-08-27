<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /*
        Função a ser chamada para popular o BD com dados aleatórios.
    */
    public function run(): void
    {
        for ($i=0; $i<5; $i++){ //Irá gerar 5 registros com strings aleatórias tanto para o titulo qunato para a descrição.
            DB::table('task')->insert(
                [
                    'titulo' => Str::random(10),
                    'desc' => Str::random(10),
                    'created_at' => Carbon::now()
                ]
            );   
        }
    }
}
