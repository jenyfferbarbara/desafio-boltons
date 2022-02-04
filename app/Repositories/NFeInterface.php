<?php

namespace App\Repositories;

use App\Models\NFe;

/**
 * Interface para ações da entidade NFe no banco de dados.
 */
interface NFeInterface
{
    /**
     * Pesquisa NFe pela chave de acesso.
     *
     * @param string $accessKey
     * @return NFe
     */
    public function findByAccessKey(string $accessKey);

    /**
     * Salva ou Atualiza as NFes informadas.
     *
     * @param array $documents
     */
    public function saveOrUpdate(array $documents): void;
}
