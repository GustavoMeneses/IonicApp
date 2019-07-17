<?php

namespace App\Services;

use App\Repositories\PerfilRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidationPerfil;

class PerfilService
{
  private $perfilRepository;

  public function __construct(PerfilRepositoryInterface $perfilRepository)
  {
      $this->perfilRepository = $perfilRepository;
  }

  public function getAll(){

    try {

      $perfis = $this->perfilRepository->getAll();

      if(count($perfis) > 0){
        return response()->json($perfis, Response::HTTP_OK);
      } else {
        return response()->json([], Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }

  public function get($id){

    try {

      $perfil = $this->perfilRepository->get($id);

      $contador = ((is_array($perfil) || is_object($perfil)) ? 1 : 0);

      if($contador > 0){
        return response()->json($perfil, Response::HTTP_OK);
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
      ValidationPerfil::RULE_PERFIL
    );

    if($validator->fails()){

      return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);

    } else {

      try {

        $perfil = $this->perfilRepository->store($request);

        return response()->json($perfil, Response::HTTP_CREATED);

      } catch (QueryException $exception){

        return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

      }
  }

  }

  public function update($id, Request $request){

    $validator = Validator::make(
      $request->all(),
      ValidationPerfil::RULE_PERFIL
    );

    if($validator->fails()){

      return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);

    } else {

      try {

          $perfil = $this->perfilRepository->update($id,$request);
          return response()->json($perfil, Response::HTTP_CREATED);

        } catch (QueryException $exception){

          return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

  }

  public function destroy($id){

    try {

      $perfil = $this->perfilRepository->delete($id);

      return response()->json(null, Response::HTTP_OK);

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }
}

?>
