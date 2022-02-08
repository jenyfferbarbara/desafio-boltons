<?php

namespace Tests\Unit\Core\Modules\Desafio\NFeFind\Rules;

use Tests\TestCase;

class GetNfesRuleTest extends TestCase
{
    public function testBuscarNfesSuccessful(): void
    {
        $rule = new GetNfesRule();
        $nfes = $rule->apply();

        self::assertEquals(50, sizeof($nfes));
    }
}
