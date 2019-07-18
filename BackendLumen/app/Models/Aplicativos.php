<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplicativos extends Model
{
    protected $table = 'Aplicativo';

    protected $primaryKey = 'id_aplicativo';

    protected $fillable = [
        'nome'
    ];

    public $timestamps = false;

    public function pessoasaplicativos()
    {
      return $this->belongsTo('App\Models\PessoasAplicativos','id_aplicativo','id_aplicativo');
    }

}


 ?>
