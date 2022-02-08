<?php

namespace Core\Modules\Desafio\NFeSync\Gateways;

/**
 * Interface para ações de persistência da entidade Desafio no banco de dados.
 */
interface NFeSaveGateway
{
    /**
     * Salva ou Atualiza as NFes informadas.
     *
     * @param array $documents
     */
    public function saveOrUpdate(array $documents): void;
}
