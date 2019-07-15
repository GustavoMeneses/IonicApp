<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    protected $table = 'Pessoa';

    protected $primaryKey = 'id_pessoa';

    protected $fillable = [
        'nome',
        'cpf',
        'dt_nascimento',
        'rg'
    ];

    protected $casts = [
      'dt_nascimento' => 'Timestamp'
    ];

    public $timestamps = false;


}


 ?>
