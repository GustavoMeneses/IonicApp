<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'Usuario';

    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'id_perfil',
        'id_pessoa'        
    ];

    public $timestamps = false;

    public function perfis()
    {
      return $this->hasMany('App\Models\Perfis','id_perfil','id_perfil');
    }

    public function pessoas()
    {
      return $this->hasMany('App\Models\Pessoas','id_pessoa','id_pessoa');
    }

    public function acessos()
    {
      return $this->belongsTo('App\Models\Acessos','id_usuario','id_usuario');
    }


}


 ?>
