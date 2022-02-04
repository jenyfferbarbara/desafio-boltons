<?php

namespace Tests\Unit\Services\Rules;

use App\Models\NFe;
use App\Repositories\NFeInterface;
use App\Services\Rules\GetNfesRule;
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
