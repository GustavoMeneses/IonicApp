<?php

namespace App\Http\Controllers;

use App\Services\AplicativoService;
use Illuminate\Http\Request;

class AplicativosController extends Controller
{
    private $aplicativoService;

    public function __construct(AplicativoService $aplicativoService)
    {
        $this->aplicativoService = $aplicativoService;
    }

    public function getAll(){

      return $this->aplicativoService->getAll();
    }

    public function get($id){

      return $this->aplicativoServico->get($id);
    }

    public function store(Request $request){

      return $this->aplicativoServico->store($request);
    }

    public function update($id, Request $request){

      return $this->aplicativoServico->update($id, $request);
    }

    public function destroy($id){

      return $this->aplicativoServico->destroy($id);
    }
    //
}
