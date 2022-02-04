<?php

namespace App\Repositories;

use App\Models\NFe;

/**
 * Repository para ações da entidade NFe no banco de dados.
 */
class NFeRepository implements NFeInterface
{
    public function findByAccessKey(string $accessKey)
    {
        return NFe::firstWhere("access_key", $accessKey);
    }

    public function saveOrUpdate(array $documents): void
    {
        foreach($documents as $doc){
            $xml = base64_decode($doc['xml']);
            $json = json_encode(simplexml_load_string($xml));
            $array = json_decode($json, true);

            $nfe = NFe::updateOrCreate([
                "access_key" => $doc['access_key'],
                "price" => $array['NFe']['infNFe']['total']['ICMSTot']['vNF']
            ]);
        }
    }
}
