<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpCode;

/**
 * Controller para ações da entidade Desafio.
 */
class NFesController extends Controller
{
    /**
     * Faz integração com endpoint da Arquivei e salva as notas no banco de dados.
     *
     * @return View
     *  nome da tela e mensagem a ser exibida
     */
    public function sync()
    {
        try {
            $useCase = new \Core\Modules\Desafio\NFeSync\UseCase(
                new \App\Adapters\Modules\Desafio\NFeSync\NFeSaveAdapter()
            );
            $useCase->execute();

            $mensagem = 'Sincronização efetuada com Sucesso.';

            return new JsonResponse([
                'status' => [
                    'success' => true,
                    'code' => HttpCode::HTTP_OK,
                    'message' => HttpCode::$statusTexts[HttpCode::HTTP_OK],
                ],
                'data' => $mensagem
            ], HttpCode::HTTP_OK);
        } catch (\DomainException $exception) {
            return new JsonResponse([
                'status' => [
                    'success' => false,
                    'code' => 4000,
                    'message' => 'Ocorreu um erro esperado ao sincronizar as notas',
                ]
            ], HttpCode::HTTP_FORBIDDEN);
        } catch (\Throwable $throwable) {
            return new JsonResponse([
                'status' => [
                    'success' => false,
                    'code' => HttpCode::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => HttpCode::$statusTexts[HttpCode::HTTP_INTERNAL_SERVER_ERROR],
                ]
            ], HttpCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Faz a pesquisas das notas no banco de dados, filtrando pela Chave de Acesso informada na tela.
     *
     * @param Request $request
     *  com os dados informados pelo usuário na tela
     *
     * @return View
     *  nome da tela e mensagem a ser exibida
     */
    public function search(Request $request)
    {
        try {
            $accessKey = $request->input('access_key');

            $useCase = new \Core\Modules\Desafio\NFeFind\UseCase(
                new \App\Adapters\Modules\Desafio\NFeFind\NFeFinderAdapter()
            );
            $nfe = $useCase->execute($accessKey);

            if(isset($nfe)) {
                $result = 'Chave de Acesso: '. $accessKey . ' Valor: ' . $nfe->price;
            } else {
                $result = 'Não encontrada NF-e com chave de Acesso '. $accessKey;
            }

            return new JsonResponse([
                'status' => [
                    'success' => true,
                    'code' => HttpCode::HTTP_OK,
                    'message' => HttpCode::$statusTexts[HttpCode::HTTP_OK],
                ],
                'data' => $result
            ], HttpCode::HTTP_OK);
        } catch (\DomainException $exception) {
            return new JsonResponse([
                'status' => [
                    'success' => false,
                    'code' => 4000,
                    'message' => 'Ocorreu um erro esperado ao pesquisar as notas',
                ]
            ], HttpCode::HTTP_FORBIDDEN);
        } catch (\Throwable $throwable) {
            return new JsonResponse([
                'status' => [
                    'success' => false,
                    'code' => HttpCode::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => HttpCode::$statusTexts[HttpCode::HTTP_INTERNAL_SERVER_ERROR],
                ]
            ], HttpCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
