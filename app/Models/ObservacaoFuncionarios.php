<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservacaoFuncionarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'observacao',
        'dataobservacao',
        'id_funcionario'
    ];


}
