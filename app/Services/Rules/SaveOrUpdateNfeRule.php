<?php

namespace App\Services\Rules;

use App\Repositories\NFeInterface;

/**
 * Regra para persistência das NFes no banco de dados.
 */
class SaveOrUpdateNfeRule
{
    private $nfeRepository;
    private $documents;

    public function __construct(NFeInterface $nfeRepository)
    {
        $this->nfeRepository = $nfeRepository;
    }

    public function __invoke(array $documents): SaveOrUpdateNfeRule
    {
        $this->documents = $documents;
        return $this;
    }

    /**
     * Salva ou Atualiza as NFes informadas.
     */
    public function apply(): void
    {
        $this->nfeRepository->saveOrUpdate($this->documents);
    }
}
