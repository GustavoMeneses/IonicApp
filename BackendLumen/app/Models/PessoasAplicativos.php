<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoasAplicativos extends Model
{
    protected $table = 'Pessoa_aplicativo';

    protected $primaryKey = 'id_pessoa_aplicativo';

    /*protected $fillable = [
        'nome',
        'cpf',
        'dt_nascimento',
        'rg'
    ];*/

    public $timestamps = false;

    public function perfispessoas()
    {
      return $this->hasMany('App\Models\PerfisPessoas','id_perfil_pessoa','id_perfil_pessoa');
    }

    public function aplicativos()
    {
      return $this->hasMany('App\Models\Aplicativos','id_aplicativo','id_aplicativo');
    }


}


 ?>
