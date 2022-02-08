<?php

namespace Tests\Unit\Core\Modules\Desafio\NFeSync\Rules;

use Tests\TestCase;

class SaveOrUpdateNfeRuleTest extends TestCase
{
    public function testSaveNfeSuccessful(): void
    {
        $documentos = ['1', '2', '3'];

        $nfeRepositoryMock = $this->createMock(NFeSaveGateway::class);
        $nfeRepositoryMock->expects(self::once())->method('saveOrUpdate');

        $rule = (new SaveOrUpdateNfeRule($nfeRepositoryMock))($documentos);
        $rule->apply();
    }
}
