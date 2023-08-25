<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model //Modelo referente ao objeto 'Tarefa'
{
    use HasFactory;
    protected $fillable = [ //Colunas da tabela que vão ser preenchidas
        'titulo',
        'desc'
    ];
}
