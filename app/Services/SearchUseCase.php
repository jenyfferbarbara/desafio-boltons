<?php

namespace App\Services;

use App\Repositories\NFeInterface;
use \App\Services\Rules\FindNFeRule;

/**
 * Serviço para busca de NFe.
 */
final class SearchUseCase
{
    private $nfeRepository;

    public function __construct(NFeInterface $nfeRepository)
    {
        $this->nfeRepository = $nfeRepository;
    }

    /**
     * Busca NFe pela chave de acesso.
     *
     * @param string $accessKey
     * @return NFe
     */
    public function execute(string $accessKey)
    {
        return (new FindNFeRule($this->nfeRepository))($accessKey)->apply();
    }
}
