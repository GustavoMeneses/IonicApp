<?php

namespace App\Http\Controllers;

use App\Services\PerfilService;
use Illuminate\Http\Request;

class PerfisController extends Controller
{
    private $perfilService;

    public function __construct(PerfilService $perfilService)
    {
        $this->perfilService = $perfilService;
    }

    public function getAll(){

      return $this->perfilService->getAll();
    }

    public function get($id){

      return $this->perfilService->get($id);
    }

    public function store(Request $request){

      return $this->perfilService->store($request);
    }

    public function update($id, Request $request){

      return $this->perfilService->update($id, $request);
    }

    public function destroy($id){

      return $this->perfilService->destroy($id);
    }
    //
}
