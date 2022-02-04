<?php

namespace Tests\Unit\Services\Rules;

use App\Models\NFe;
use App\Repositories\NFeInterface;
use App\Services\SearchUseCase;
use Tests\TestCase;

class SearchUseCaseTest extends TestCase
{
    public function testFindByAccessKeySuccessful(): void
    {
        $nfe = new NFe();
        $nfe->access_key = '123';
        $nfe->price = 1;

        $nfeRepositoryMock = $this->createMock(NFeInterface::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn($nfe);

        $useCase = new SearchUseCase($nfeRepositoryMock);

        self::assertEquals($nfe, $useCase->execute('123'));
    }

    public function testFindByAccessKeyNfeNaoEncontradaSuccessful(): void
    {
        $nfeRepositoryMock = $this->createMock(NFeInterface::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn(null);

        $useCase = new SearchUseCase($nfeRepositoryMock);

        self::assertEquals(null, $useCase->execute('123'));
    }
}
