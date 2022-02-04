<?php

namespace Tests\Unit\Services\Rules;

use App\Models\NFe;
use App\Repositories\NFeInterface;
use App\Services\Rules\FindNFeRule;
use Tests\TestCase;

class FindNfeRuleTest extends TestCase
{
    public function testFindByAccessKeySuccessful(): void
    {
        $nfe = new NFe();
        $nfe->access_key = '123';
        $nfe->price = 1;

        $nfeRepositoryMock = $this->createMock(NFeInterface::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn($nfe);

        $rule = (new FindNFeRule($nfeRepositoryMock))('123');

        self::assertEquals($nfe, $rule->apply());
    }

    public function testFindByAccessKeyNfeNaoEncontradaSuccessful(): void
    {
        $nfeRepositoryMock = $this->createMock(NFeInterface::class);
        $nfeRepositoryMock->expects(self::once())->method('findByAccessKey')->willReturn(null);

        $rule = (new FindNFeRule($nfeRepositoryMock))('123');

        self::assertEquals(null, $rule->apply());
    }
}
