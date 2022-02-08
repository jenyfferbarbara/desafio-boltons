<?php

namespace Core\Modules\Desafio\NFeSync\Rules;

use Core\Modules\Alerts\Fetch\Exception\FindAlertsException;
use Core\Modules\Desafio\NFeSync\Gateways\NFeSaveGateway;

/**
 * Regra para persistência das NFes no banco de dados.
 */
class SaveOrUpdateNfeRule
{
    private $nfeSaveGateway;
    private $documents;

    public function __construct(NFeSaveGateway $nfeSaveGateway)
    {
        $this->nfeSaveGateway = $nfeSaveGateway;
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
        try {
            $this->nfeSaveGateway->saveOrUpdate($this->documents);
        } catch (\Throwable $throwable) {
            throw new NFeSyncException($throwable);
        }
    }
}
