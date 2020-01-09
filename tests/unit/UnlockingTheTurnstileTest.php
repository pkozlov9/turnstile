<?php

namespace turnstile\tests\unit;

use PHPUnit\Framework\TestCase;
use src\turnstile\Turnstile;
use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\UnlockedTurnstileState;

class UnlockingTheTurnstileTest extends TestCase
{
    /**
     * User Story: Unlocking the turnstile
     * SCENARIO
     */
    public function testUnlockingTheTurnstile()
    {
        echo PHP_EOL . 'User Story: Unlocking the turnstile' . PHP_EOL;

        $turnstile = new Turnstile();
        $lockedState = new LockedTurnstileState($turnstile);
        $unlockedState = new UnlockedTurnstileState($turnstile);
        /**
         * Given the turnstile is locked
         */
        $this->assertEquals($lockedState, $turnstile->getState());
        /**
         * When I add a coin
         */
        $turnstile->insertToken();
        /**
         * The turnstile will unlock
         */
        $this->assertEquals($unlockedState, $turnstile->getState());
    }
}
