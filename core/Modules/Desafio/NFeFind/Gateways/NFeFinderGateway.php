<?php

namespace Core\Modules\Desafio\NFeFind\Gateways;

/**
 * Interface para ações de consulta da entidade Desafio no banco de dados.
 */
interface NFeFinderGateway
{
    /**
     * Pesquisa Desafio pela chave de acesso.
     *
     * @param string $accessKey
     * @return NFe
     */
    public function findByAccessKey(string $accessKey);
}
