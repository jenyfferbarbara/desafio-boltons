<?php

namespace Tests\Unit\Core\Modules\Desafio\NFeFind\Rules;

use Tests\TestCase;

class FindNfeRuleTest extends TestCase
{
    public function testFindByAccessKeySuccessful(): void
    {
        $nfe = new NFe();
        $nfe->access_key = '123';
        $nfe->price = 1;

        $nfeRepositoryMock = $this->createMock(NFeSaveGateway::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn($nfe);

        $rule = (new FindNFeRule($nfeRepositoryMock))('123');

        self::assertEquals($nfe, $rule->apply());
    }

    public function testFindByAccessKeyNfeNaoEncontradaSuccessful(): void
    {
        $nfeRepositoryMock = $this->createMock(NFeSaveGateway::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn(null);

        $rule = (new FindNFeRule($nfeRepositoryMock))('123');

        self::assertEquals(null, $rule->apply());
    }
}
