<?php

namespace Tests\Unit\Services\Rules;

use App\Models\NFe;
use App\Repositories\NFeInterface;
use App\Services\SyncNotesUseCase;
use Tests\TestCase;

class SyncNotesUseCaseTest extends TestCase
{
    public function testFindByAccessKeySuccessful(): void
    {
        $nfe = new NFe();
        $nfe->access_key = '123';
        $nfe->price = 1;

        $nfeRepositoryMock = $this->createMock(NFeInterface::class);
        $nfeRepositoryMock->expects(self::once())->method('saveOrUpdate');

        $useCase = new SyncNotesUseCase($nfeRepositoryMock);
        $useCase->execute();
    }
}
