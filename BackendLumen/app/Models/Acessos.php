<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acessos extends Model
{
    protected $table = 'Acesso';

    protected $primaryKey = 'id_acesso';

    /*protected $fillable = [
        'nome',
        'cpf',
        'dt_nascimento',
        'rg'
    ];*/

    public $timestamps = false;

    public function usuarios()
    {
      return $this->hasMany('App\Models\Usuarios','id_usuario','id_usuario');
    }

    public function aplicativos()
    {
      return $this->hasMany('App\Models\Aplicativos','id_aplicativo','id_aplicativo');
    }


}


 ?>
