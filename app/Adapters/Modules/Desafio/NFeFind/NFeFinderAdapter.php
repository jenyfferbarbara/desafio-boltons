<?php

namespace App\Adapters\Modules\Desafio\NFeFind;

use Core\Modules\Desafio\NFeFind\Gateways\NFeFinderGateway;
use Core\Modules\Desafio\NFeFind\Entities\NFe;

/**
 * Repository para ações de consulta da entidade Desafio no banco de dados.
 */
class NFeFinderAdapter implements NFeFinderGateway
{
    public function findByAccessKey(string $accessKey)
    {
        return NFe::firstWhere("access_key", $accessKey);
    }
}
