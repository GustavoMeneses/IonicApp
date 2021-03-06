<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getUsuarios()
    {
      $valores = DB::table('Usuario')
                    ->join('Perfil', 'Usuario.id_perfil', 'Perfil.id_perfil')
                    ->join('Pessoa', 'Usuario.id_pessoa', 'Pessoa.id_pessoa')
                    ->select('Usuario.id_usuario', 'Perfil.perfil', 'Pessoa.nome')
                    ->get();

      return $valores;
    }

}


 ?>
