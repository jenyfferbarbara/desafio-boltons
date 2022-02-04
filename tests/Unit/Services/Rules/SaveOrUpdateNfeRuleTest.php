<?php

namespace Tests\Unit\Services\Rules;

use App\Repositories\NFeInterface;
use App\Services\Rules\SaveOrUpdateNfeRule;
use Tests\TestCase;

class SaveOrUpdateNfeRuleTest extends TestCase
{
    public function testSaveNfeSuccessful(): void
    {
        $documentos = ['1', '2', '3'];

        $nfeRepositoryMock = $this->createMock(NFeInterface::class);
        $nfeRepositoryMock->expects(self::once())->method('saveOrUpdate');

        $rule = (new SaveOrUpdateNfeRule($nfeRepositoryMock))($documentos);
        $rule->apply();
    }
}
