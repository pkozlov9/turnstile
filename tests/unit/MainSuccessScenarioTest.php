<?php

namespace turnstile\tests\unit;

use PHPUnit\Framework\TestCase;
use src\turnstile\Turnstile;
use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\UnlockedTurnstileState;

class MainSuccessScenarioTest extends TestCase
{
    /**
     * MAIN SUCCESS SCENARIO
     */
    public function testMainSuccessScenario()
    {
        echo PHP_EOL . 'MAIN SUCCESS SCENARIO' . PHP_EOL;

        $turnstile = new Turnstile();
        $lockedState = new LockedTurnstileState($turnstile);
        $unlockedState = new UnlockedTurnstileState($turnstile);

        $this->assertEquals($lockedState, $turnstile->getState());
        /**
         * 1. A customer inserts a coin and the turnstile unlocks
         */
        $turnstile->insertToken();
        $this->assertEquals($unlockedState, $turnstile->getState());
        /**
         * 2. Customer passes and turnstile locks
         */
        $turnstile->passThru();
        $this->assertEquals($lockedState, $turnstile->getState());
    }
}
