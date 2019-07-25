<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acessos extends Model
{
    protected $table = 'Acesso';

    protected $primaryKey = 'id_acesso';

    protected $fillable = [
        'id_usuario',
        'id_aplicativo'
    ];

    public $timestamps = false;

    public function usuarios()
    {
      return $this->hasMany('App\Models\Usuarios','id_usuario','id_usuario');
    }

    public function aplicativos()
    {
      return $this->hasMany('App\Models\Aplicativos','id_aplicativo','id_aplicativo');
    }

    public function getAcessos()
    {
      $valores = DB::table('Acesso')
                    ->join('Usuario', 'Usuario.id_usuario', 'Acesso.id_usuario')
                    ->join('Perfil', 'Perfil.id_perfil', 'Usuario.id_perfil')
                    ->join('Pessoa', 'Pessoa.id_pessoa', 'Usuario.id_pessoa')
                    ->join('Aplicativo', 'Aplicativo.id_aplicativo', 'Acesso.id_aplicativo')
                    ->select('Acesso.id_acesso', 'Perfil.perfil', 'Pessoa.nome', 'Aplicativo.nome as aplicativo')
                    ->get();

      return $valores;
    }

}


 ?>
