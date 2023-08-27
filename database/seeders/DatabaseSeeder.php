<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        for ($i=0; $i<5; $i++){
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
