<?php

namespace App\Http\Controllers;

use App\Services\SearchUseCase;
use Illuminate\Http\Request;
use App\Repositories\NFeInterface;
use App\Services\SyncNotesUseCase;

/**
 * Controller para ações da entidade NFe.
 */
class NFesController extends Controller
{
    private $nfeRepository;

    public function __construct(NFeInterface $nfeRepository)
    {
        $this->nfeRepository = $nfeRepository;
    }

    /**
     * Retorna a tela principal da funcionalidade.
     *
     * @return View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Faz integração com endpoint da Arquivei e salva as notas no banco de dados.
     *
     * @return View
     *  nome da tela e mensagem a ser exibida
     */
    public function sync()
    {
        $useCase = new SyncNotesUseCase($this->nfeRepository);
        $useCase->execute();

        $mensagem = 'Sincronização efetuada com Sucesso.';

        return view('index',compact('mensagem'));
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
        $accessKey = $request->input('search');

        $useCase = new SearchUseCase($this->nfeRepository);
        $nfe = $useCase->execute($accessKey);

        if(isset($nfe))
        {
            $result = 'Chave de Acesso: '. $accessKey . ' Valor NFe: ' . $nfe->price;
        }
        else
        {
            $result = 'Não encontrada NF-e com chave de Acesso '. $accessKey;
        }

        return view('index',compact('result'));
    }
}
