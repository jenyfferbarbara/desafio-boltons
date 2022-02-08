<?php

namespace Core\Modules\Desafio\NFeFind;

use Core\Modules\Desafio\NFeFind\Gateways\NFeFinderGateway;
use Core\Modules\Desafio\NFeFind\Rules\FindNFeRule;

/**
 * Serviço para busca de Desafio.
 */
final class UseCase
{
    private $nfeFinderGateway;

    public function __construct(
        NFeFinderGateway $nfeFinderGateway
    ) {
        $this->nfeFinderGateway = $nfeFinderGateway;
    }

    /**
     * Busca Desafio pela chave de acesso.
     *
     * @param string $accessKey
     * @return Desafio
     */
    public function execute(string $accessKey)
    {
        try {
            return (new FindNFeRule($this->nfeFinderGateway))($accessKey)->apply();
        } catch (\Throwable $throwable) {
            $this->logger->error('Ocorreu um erro ao executar este caso de uso', [
                'exception' => $throwable
            ]);
            throw $throwable;
        }
    }
}
