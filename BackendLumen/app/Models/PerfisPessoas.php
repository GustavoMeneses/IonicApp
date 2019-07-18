<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfisPessoas extends Model
{
    protected $table = 'Perfil_pessoa';

    protected $primaryKey = 'id_perfil_pessoa';

    /*protected $fillable = [
        'nome',
        'cpf',
        'dt_nascimento',
        'rg'
    ];*/

    public $timestamps = false;

    public function perfis()
    {
      return $this->hasMany('App\Models\Perfis','id_perfil','id_perfil');
    }

    public function pessoas()
    {
      return $this->hasMany('App\Models\Pessoas','id_pessoa','id_pessoa');
    }

    public function pessoasaplicativos()
    {
      return $this->belongsTo('App\Models\PessoasAplicativos','id_perfil_pessoa','id_perfil_pessoa');
    }


}


 ?>
