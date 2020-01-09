<?php

namespace turnstile\tests\unit;

use PHPUnit\Framework\TestCase;
use src\turnstile\Turnstile;
use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\UnlockedTurnstileState;

class MainSuccessScenarioTwoBTest extends TestCase
{
    /**
     * MAIN SUCCESS SCENARIO
     */
    public function testMainSuccessScenarioTwoB()
    {
        echo PHP_EOL . 'MAIN SUCCESS SCENARIO 2.b' . PHP_EOL;

        $turnstile = new Turnstile();
        $lockedState = new LockedTurnstileState($turnstile);
        $unlockedState = new UnlockedTurnstileState($turnstile);

        $this->assertEquals($lockedState, $turnstile->getState());
        $turnstile->insertToken();
        /**
         * 2.b Customer inserts a coin again
         */
        $turnstile->insertToken();
        /**
         * Turnstile remains unlocked
         */
        $this->assertEquals($unlockedState, $turnstile->getState());
    }
}

