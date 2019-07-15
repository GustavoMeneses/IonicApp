<?php

namespace App\Models;

class ValidationPessoa
{
    const RULE_PESSOA = [
      'nome' => 'required | max:80',
      'cpf' => 'required | digits:11',
      'dt_nascimento' => 'required | date_format: "Y-m-d"',
      'rg' => 'required | digits_between:7,8'
    ];

}


 ?>
