<?php

namespace App\Services;

use App\Repositories\AcessoRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AcessoService
{
  private $acessoRepository;

  public function __construct(AcessoRepositoryInterface $acessoRepository)
  {
      $this->acessoRepository = $acessoRepository;
  }

  public function getAll(){

    try {

      $acessos = $this->acessoRepository->getAll();

      if(count($acessos) > 0){
        return response()->json($acessos, Response::HTTP_OK);
      } else {
        return response()->json([], Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }

  public function get($id){

    try {

      $acesso = $this->acessoRepository->get($id);

      $contador = ((is_array($acesso) || is_object($acesso)) ? 1 : 0);

      if($contador > 0){
        return response()->json($acesso, Response::HTTP_OK);
      } else {
        return response()->json(null, Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }
  }

  public function store(Request $request){

      try {

        $acesso = $this->acessoRepository->store($request);

        return response()->json($acesso, Response::HTTP_CREATED);

      } catch (QueryException $exception){

        return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

      }

  }

  public function update($id, Request $request){

      try {

          $acesso = $this->acessoRepository->update($id,$request);
          return response()->json($acesso, Response::HTTP_CREATED);

        } catch (QueryException $exception){

          return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

  }

  public function destroy($id){

    try {

      $acesso = $this->acessoRepository->destroy($id);

      return response()->json(null, Response::HTTP_OK);

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }
}

?>
