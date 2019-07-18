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

    public function perfispessoas()
    {
      return $this->belongsTo('App\Models\PerfisPessoas','id_perfil','id_perfil');
    }


}


 ?>
