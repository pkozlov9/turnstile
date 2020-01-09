<?php

namespace turnstile\tests\unit;

use PHPUnit\Framework\TestCase;
use src\turnstile\Turnstile;
use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\AlarmTurnstileState;

class RaisingAnAlarmTest extends TestCase
{
    /**
     * User Story: Raising an alarm
     * SCENARIO
     */
    public function testRaisingAnAlarm()
    {
        echo PHP_EOL . 'User Story: Raising an alarm';

        $turnstile = new Turnstile();
        $lockedState = new LockedTurnstileState($turnstile);
        $alarmState = new AlarmTurnstileState($turnstile);
        $turnstile->lock();
        /**
         * Given the turnstile is locked
         */
        $this->assertEquals($lockedState, $turnstile->getState());
        /**
         * When I pass
         */
        $turnstile->passThru();
        /**
         * An alarm is triggered
         */
        $this->assertEquals($alarmState, $turnstile->getState());
        /**
         * And If I add a coin
         */
        $turnstile->insertToken();
        /**
         * The alarm will end
         */
        $this->assertNotEquals($alarmState, $turnstile->getState());
    }
}
