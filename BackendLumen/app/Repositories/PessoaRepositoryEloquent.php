<?php

namespace App\Repositories;

use App\Repositories\PessoaRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Pessoas;

class PessoaRepositoryEloquent implements PessoaRepositoryInterface
{
  private $model;

  public function __construct(Pessoas $pessoas){
    $this->model = $pessoas;
  }

  public function getAll(){
    return $this->model->all();
  }

  public function get($id){
    return $this->model->find($id);
  }

  public function store(Request $request){
    return $this->model->create($request->all());
  }

  public function update($id, Request $request){
    return $this->model->find($id)->update($request->all());
  }

  public function destroy($id){
    return $this->model->find($id)->delete();
  }

}


 ?>
