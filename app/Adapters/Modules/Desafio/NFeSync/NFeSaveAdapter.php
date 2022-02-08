<?php

namespace App\Adapters\Modules\Desafio\NFeSync;

use Core\Modules\Desafio\NFeSync\Gateways\NFeSaveGateway;
use Core\Modules\Desafio\NFeSync\Entities\NFe;

/**
 * Repository para ações de persistência da entidade Desafio no banco de dados.
 */
class NFeSaveAdapter implements NFeSaveGateway
{
    public function saveOrUpdate(array $documents): void
    {
        foreach($documents as $doc){
            $xml = base64_decode($doc['xml']);
            $json = json_encode(simplexml_load_string($xml));
            $array = json_decode($json, true);

            NFe::updateOrCreate([
                "access_key" => $doc['access_key'],
                "price" => $array['NFe']['infNFe']['total']['ICMSTot']['vNF']
            ]);
        }
    }
}
