<?php

namespace turnstile\tests\unit;

use PHPUnit\Framework\TestCase;
use src\turnstile\Turnstile;
use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\UnlockedTurnstileState;

class LockingTheTurnstileTest extends TestCase
{
    /**
     * User Story: Locking the turnstile
     * SCENARIO
     */
    public function testLockingTheTurnstile()
    {
        echo PHP_EOL . 'User Story: Locking the turnstile' . PHP_EOL;

        $turnstile = new Turnstile();
        $lockedState = new LockedTurnstileState($turnstile);
        $unlockedState = new UnlockedTurnstileState($turnstile);
        $turnstile->unlock();
        /**
         * Given the turnstile is unlocked
         */
        $this->assertEquals($unlockedState, $turnstile->getState());
        /**
         * When I pass trough the turnstile
         */
        $turnstile->passThru();
        /**
         * The turnstile will lock
         */
        $this->assertEquals($lockedState, $turnstile->getState());
    }
}
