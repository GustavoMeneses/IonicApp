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

      return $this->aplicativoService->get($id);
    }

    public function store(Request $request){

      return $this->aplicativoService->store($request);
    }

    public function update($id, Request $request){

      return $this->aplicativoService->update($id, $request);
    }

    public function destroy($id){

      return $this->aplicativoService->destroy($id);
    }
    //
}
