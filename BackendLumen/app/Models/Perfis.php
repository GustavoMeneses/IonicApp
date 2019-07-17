<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfis extends Model
{
    protected $table = 'Perfil';

    protected $primaryKey = 'id_perfil';

    protected $fillable = [
        'perfil'
    ];

    public $timestamps = false;


}


 ?>
