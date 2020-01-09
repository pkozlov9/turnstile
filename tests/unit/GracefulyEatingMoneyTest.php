<?php

namespace turnstile\tests\unit;

use PHPUnit\Framework\TestCase;
use src\turnstile\Turnstile;
use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\UnlockedTurnstileState;

class GracefulyEatingMoneyTest extends TestCase
{
    /**
     * User Story: Gracefuly eating money
     * SCENARIO
     */
    public function testGracefulyEatingMoney()
    {
        echo PHP_EOL . 'User Story: Gracefuly eating money' . PHP_EOL;

        $turnstile = new Turnstile();
        $unlockedState = new UnlockedTurnstileState($turnstile);
        $lockedState = new LockedTurnstileState($turnstile);
        /**
         * Given the turnstile is locked
         */
        $this->assertEquals($lockedState, $turnstile->getState());
        /**
         * When I add a coin
         */
        $turnstile->insertToken();
        /**
         * And then another coin
         */
        $turnstile->insertToken();
        /**
         * The turnstile will be unlocked
         */
        $this->assertEquals($unlockedState, $turnstile->getState());
        /**
         * And If I pass
         */
        $turnstile->passThru();
        /**
         * The turnstile will be locked
         */
        $this->assertEquals($lockedState, $turnstile->getState());
    }
}
