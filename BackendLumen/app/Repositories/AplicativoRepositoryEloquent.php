<?php

namespace App\Repositories;

use App\Repositories\AplicativoRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Aplicativos;

class AplicativoRepositoryEloquent implements AplicativoRepositoryInterface
{
  private $model;

  public function __construct(Aplicativos $aplicativos){
    $this->model = $aplicativos;
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
