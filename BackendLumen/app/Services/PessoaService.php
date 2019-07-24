<?php

namespace App\Services;

use App\Repositories\PessoaRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidationPessoa;

class PessoaService
{
  private $pessoaRepository;

  public function __construct(PessoaRepositoryInterface $pessoaRepository)
  {
      $this->pessoaRepository = $pessoaRepository;
  }

  public function getAll(){

    try {

      $pessoas = $this->pessoaRepository->getAll();

      if(count($pessoas) > 0){
        return response()->json($pessoas, Response::HTTP_OK);
      } else {
        return response()->json([], Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }

  public function get($id){

    try {

      $pessoa = $this->pessoaRepository->get($id);

      $contador = ((is_array($pessoa) || is_object($pessoa)) ? 1 : 0);

      if($contador > 0){
        return response()->json($pessoa, Response::HTTP_OK);
      } else {
        return response()->json(null, Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }
  }

  public function store(Request $request){

    $validator = Validator::make(
      $request->all(),
      ValidationPessoa::RULE_PESSOA
    );

    if($validator->fails()){

      return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);

    } else {

      try {

        $pessoa = $this->pessoaRepository->store($request);

        return response()->json($pessoa, Response::HTTP_CREATED);

      } catch (QueryException $exception){

        return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

      }
  }

  }

  public function update($id, Request $request){

    $validator = Validator::make(
      $request->all(),
      ValidationPessoa::RULE_PESSOA
    );

    if($validator->fails()){

      return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);

    } else {

      try {

          $pessoa = $this->pessoaRepository->update($id,$request);
          return response()->json($pessoa, Response::HTTP_CREATED);

        } catch (QueryException $exception){

          return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

  }

  public function destroy($id){

    try {

      $pessoa = $this->pessoaRepository->destroy($id);

      //return response()->json(null, Response::HTTP_OK);
      return response()->json($pessoa, Response::HTTP_OK);

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }
}

?>
