<?php

namespace turnstile\tests\unit;

use PHPUnit\Framework\TestCase;
use src\turnstile\Turnstile;
use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\AlarmTurnstileState;

class MainSuccessScenarioOneATest extends TestCase
{
    /**
     * MAIN SUCCESS SCENARIO
     */
    public function testMainSuccessScenarioOneA()
    {
        echo PHP_EOL . 'MAIN SUCCESS SCENARIO 1.a' . PHP_EOL;

        $turnstile = new Turnstile();
        $lockedState = new LockedTurnstileState($turnstile);
        $alarmState = new AlarmTurnstileState($turnstile);

        $this->assertEquals($lockedState, $turnstile->getState());
        /**
         * 1.a Customer passes without inserting a coin
         */
        $turnstile->passThru();
        /**
         * The turnstile will raise an alarm
         */
        $this->assertEquals($alarmState, $turnstile->getState());
    }
}
