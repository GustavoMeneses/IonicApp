<?php

namespace App\Repositories;

use App\Repositories\AcessoRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Acessos;

class AcessoRepositoryEloquent implements AcessoRepositoryInterface
{
  private $model;

  public function __construct(Acessos $acessos){
    $this->model = $acessos;
  }

  public function getAll(){
    return $this->model->getAcessos();
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
