<?php

namespace App\Http\Controllers;

use App\Services\AcessoService;
use Illuminate\Http\Request;

class AcessosController extends Controller
{
    private $acessoService;

    public function __construct(AcessoService $acessoService)
    {
        $this->acessoService = $acessoService;
    }

    public function getAll(){

      return $this->acessoService->getAll();
    }

    public function get($id){

      return $this->acessoService->get($id);
    }

    public function store(Request $request){

      return $this->acessoService->store($request);
    }

    public function update($id, Request $request){

      return $this->acessoService->update($id, $request);
    }

    public function destroy($id){

      return $this->acessoService->destroy($id);
    }
    //
}
