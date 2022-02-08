<?php

namespace Core\Modules\Desafio\NFeFind\Rules;

use Core\Modules\Alerts\Fetch\Exception\FindAlertsException;
use Core\Modules\Desafio\NFeFind\Gateways\NFeFinderGateway;

/**
 * Regra para busca de Desafio.
 */
class FindNFeRule
{
    private $nfeFinderGateway;
    private $accessKey;

    public function __construct(NFeFinderGateway $nfeFinderGateway)
    {
        $this->nfeFinderGateway = $nfeFinderGateway;
    }

    public function __invoke(string $accessKey): FindNFeRule
    {
        $this->accessKey = $accessKey;
        return $this;
    }

    /**
     * Pesquisa Desafio pela chave de acesso.
     */
    public function apply()
    {
        try {
            return $this->nfeFinderGateway->findByAccessKey($this->accessKey);
        } catch (\Throwable $throwable) {
            throw new NFeFindException($throwable);
        }
    }
}
