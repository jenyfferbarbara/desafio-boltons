<?php

namespace Core\Modules\Desafio\NFeSync\Rules;

use Illuminate\Support\Facades\Http;

/**
 * Regra para Integrar com a API da Arquivei e buscar as NFes.
 */
class GetNfesRule
{
    public function __invoke(): GetNfesRule
    {
        return $this;
    }

    /**
     * Integra com a API da Arquivei e retorna as NFes.
     *
     * @return array
     */
    public function apply(): array
    {
        try {
            $documents = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-api-id'     => '329ea218aa65778fad452643fe4d9bdeba0673e6',
                'x-api-key'    => '39020d7f2ff4485632166f578d486f0ab74174e0'
            ])->get('https://sandbox-api.arquivei.com.br/v1/nfe/received');

            return $documents['data'];
        } catch (\Throwable $throwable) {
            throw new NFeSyncException($throwable);
        }
    }
}
