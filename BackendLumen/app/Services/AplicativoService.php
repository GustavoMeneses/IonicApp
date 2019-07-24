<?php

namespace App\Services;

use App\Repositories\AplicativoRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidationAplicativo;

class AplicativoService
{
  private $aplicativoRepository;

  public function __construct(AplicativoRepositoryInterface $aplicativoRepository)
  {
      $this->aplicativoRepository = $aplicativoRepository;
  }

  public function getAll(){

    try {

      $aplicativos = $this->aplicativoRepository->getAll();

      if(count($aplicativos) > 0){
        return response()->json($aplicativos, Response::HTTP_OK);
      } else {
        return response()->json([], Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }

  public function get($id){

    try {

      $aplicativo = $this->aplicativoRepository->get($id);

      $contador = ((is_array($aplicativo) || is_object($aplicativo)) ? 1 : 0);

      if($contador > 0){
        return response()->json($aplicativo, Response::HTTP_OK);
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
      ValidationAplicativo::RULE_APLICATIVO
    );

    if($validator->fails()){

      return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);

    } else {

      try {

        $aplicativo = $this->aplicativoRepository->store($request);

        return response()->json($aplicativo, Response::HTTP_CREATED);

      } catch (QueryException $exception){

        return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

      }
  }

  }

  public function update($id, Request $request){

    $validator = Validator::make(
      $request->all(),
      ValidationAplicativo::RULE_APLICATIVO
    );

    if($validator->fails()){

      return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);

    } else {

      try {

          $aplicativo = $this->aplicativoRepository->update($id,$request);
          return response()->json($aplicativo, Response::HTTP_CREATED);

        } catch (QueryException $exception){

          return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

  }

  public function destroy($id){

    try {

      $aplicativo = $this->aplicativoRepository->destroy($id);

      return response()->json(null, Response::HTTP_OK);

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }
}

?>
