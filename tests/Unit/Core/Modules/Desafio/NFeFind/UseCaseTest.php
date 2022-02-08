<?php

namespace Tests\Unit\Core\Modules\Desafio\NFeFind;

use Tests\TestCase;

class UseCaseTest extends TestCase
{
    public function testFindByAccessKeySuccessful(): void
    {
        $nfe = new NFe();
        $nfe->access_key = '123';
        $nfe->price = 1;

        $nfeRepositoryMock = $this->createMock(NFeSaveGateway::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn($nfe);

        $useCase = new \Modules\NFe\Sync\UseCase($nfeRepositoryMock);

        self::assertEquals($nfe, $useCase->execute('123'));
    }

    public function testFindByAccessKeyNfeNaoEncontradaSuccessful(): void
    {
        $nfeRepositoryMock = $this->createMock(NFeSaveGateway::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn(null);

        $useCase = new \Modules\NFe\Sync\UseCase($nfeRepositoryMock);

        self::assertEquals(null, $useCase->execute('123'));
    }
}
