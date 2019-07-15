<?php

namespace App\Http\Controllers;

use App\Services\PessoaService;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    private $pessoaService;

    public function __construct(PessoaService $pessoaService)
    {
        $this->pessoaService = $pessoaService;
    }

    public function getAll(){

      return $this->pessoaService->getAll();
    }

    public function get($id){

      return $this->pessoaService->get($id);
    }

    public function store(Request $request){

      return $this->pessoaService->store($request);
    }

    public function update($id, Request $request){

      return $this->pessoaService->update($id, $request);
    }

    public function destroy($id){

      return $this->pessoaService->destroy($id);
    }
    //
}
