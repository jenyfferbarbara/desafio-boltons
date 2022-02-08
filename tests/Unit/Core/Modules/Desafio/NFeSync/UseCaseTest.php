<?php

namespace Tests\Unit\Core\Modules\Desafio\NFeSync;

use Tests\TestCase;

class UseCaseTest extends TestCase
{
    public function testSyncNFesSuccessful(): void
    {
        $nfe = new NFe();
        $nfe->access_key = '123';
        $nfe->price = 1;

        $nfeRepositoryMock = $this->createMock(NFeSaveGateway::class);
        $nfeRepositoryMock->expects(self::once())->method('saveOrUpdate');

        $useCase = new UseCase($nfeRepositoryMock);
        $useCase->execute();
    }
}
