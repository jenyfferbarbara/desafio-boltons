<?php

namespace App\Services;

use App\Services\Rules\SaveOrUpdateNfeRule;
use App\Services\Rules\GetNfesRule;
use App\Repositories\NFeInterface;

/**
 * Serviço para Sincronização das NFes com a Arquivei.
 */
final class SyncNotesUseCase
{
    private $nfeRepository;

    public function __construct(NFeInterface $nfeRepository)
    {
        $this->nfeRepository = $nfeRepository;
    }

    /**
     * Integra com a API da Arquivei e faz a persistência das NFes retornadas.
     */
    public function execute(): void
    {
        $nfes = (new GetNfesRule())->apply();
        (new SaveOrUpdateNfeRule($this->nfeRepository))($nfes)->apply();
    }
}
