<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function getAll(){

      return $this->usuarioService->getAll();
    }

    public function get($id){

      return $this->usuarioService->get($id);
    }

    public function store(Request $request){

      return $this->usuarioService->store($request);
    }

    public function update($id, Request $request){

      return $this->usuarioService->update($id, $request);
    }

    public function destroy($id){

      return $this->usuarioService->destroy($id);
    }
    //
}
