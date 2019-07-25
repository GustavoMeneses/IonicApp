<?php

namespace App\Services;

use App\Repositories\UsuarioRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioService
{
  private $usuarioRepository;

  public function __construct(UsuarioRepositoryInterface $usuarioRepository)
  {
      $this->usuarioRepository = $usuarioRepository;
  }

  public function getAll(){

    try {

      $usuarios = $this->usuarioRepository->getAll();

      if(count($usuarios) > 0){
        return response()->json($usuarios, Response::HTTP_OK);
      } else {
        return response()->json([], Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }

  public function get($id){

    try {

      $usuario = $this->usuarioRepository->get($id);

      $contador = ((is_array($usuario) || is_object($usuario)) ? 1 : 0);

      if($contador > 0){
        return response()->json($usuario, Response::HTTP_OK);
      } else {
        return response()->json(null, Response::HTTP_OK);
      }

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }
  }

  public function store(Request $request){

      try {

        $usuario = $this->usuarioRepository->store($request);

        return response()->json($usuario, Response::HTTP_CREATED);

      } catch (QueryException $exception){

        return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

      }

  }

  public function update($id, Request $request){

      try {

          $usuario = $this->usuarioRepository->update($id,$request);
          return response()->json($usuario, Response::HTTP_CREATED);

        } catch (QueryException $exception){

          return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

  }

  public function destroy($id){

    try {

      $usuario = $this->usuarioRepository->destroy($id);

      return response()->json($usuario, Response::HTTP_OK);

    } catch (QueryException $exception){

      return response()->json(['error' => 'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

  }
}

?>
