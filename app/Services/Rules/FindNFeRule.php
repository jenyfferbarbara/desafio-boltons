<?php

namespace App\Services\Rules;

use App\Repositories\NFeInterface;

/**
 * Regra para busca de NFe.
 */
class FindNFeRule
{
    private $nfeRepository;
    private $accessKey;

    public function __construct(NFeInterface $nfeRepository)
    {
        $this->nfeRepository = $nfeRepository;
    }

    public function __invoke(string $accessKey): FindNFeRule
    {
        $this->accessKey = $accessKey;
        return $this;
    }

    /**
     * Pesquisa NFe pela chave de acesso.
     */
    public function apply()
    {
        return $this->nfeRepository->findByAccessKey($this->accessKey);
    }
}
