<?php

namespace Core\Modules\Desafio\NFeSync;

use Core\Modules\Desafio\NFeSync\Gateways\NFeSaveGateway;
use Core\Modules\Desafio\NFeSync\Rules\GetNfesRule;
use Core\Modules\Desafio\NFeSync\Rules\SaveOrUpdateNfeRule;

/**
 * Serviço para Sincronização das NFes com a Arquivei.
 */
final class UseCase
{
    private NFeSaveGateway $nfeSaveGateway;

    public function __construct(
        NFeSaveGateway $nfeSaveGateway
    ) {
        $this->nfeSaveGateway = $nfeSaveGateway;
    }

    /**
     * Integra com a API da Arquivei e faz a persistência das NFes retornadas.
     */
    public function execute(): void
    {
        try {
            $nfes = (new GetNfesRule())->apply();
            (new SaveOrUpdateNfeRule($this->nfeSaveGateway))($nfes)->apply();
        } catch (\Throwable $throwable) {
            $this->logger->error('Ocorreu um erro ao executar este caso de uso', [
                'exception' => $throwable
            ]);
            throw $throwable;
        }
    }
}
