<?php

namespace src\turnstile;

use src\turnstile\states\LockedTurnstileState;
use src\turnstile\states\UnlockedTurnstileState;
use src\turnstile\states\AlarmTurnstileState;
use src\turnstile\states\StateInterface;

class Turnstile
{
    private $state;
    private $lockedState;
    private $unlockedState;
    private $alarmState;

    public function __construct()
    {
        $this->lockedState = new LockedTurnstileState($this);
        $this->unlockedState = new UnlockedTurnstileState($this);
        $this->alarmState = new AlarmTurnstileState($this);

        /**
         * set initial state of turnstile
         */
        $this->state = $this->lockedState;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState(StateInterface $state)
    {
        $this->state = $state;
    }

    public function insertToken()
    {
        $this->state->insertToken();
    }

    public function passThru()
    {
        $this->state->passThru();
    }

    public function lock()
    {
        echo 'Locking the turnstile...'. PHP_EOL;
        $this->setState($this->lockedState);
        echo $this->getState(). PHP_EOL;
    }

    public function unlock()
    {
        echo 'Unlocking the turnstile...'. PHP_EOL;
        $this->setState($this->unlockedState);
        echo $this->getState() . PHP_EOL;
    }

    public function alarm()
    {
        echo 'Alert! Cannot pass through without inserting a token!!' . PHP_EOL;
        /**
         * set the state to ALARM state
         */
        $this->setState($this->alarmState);
        /**
         * send the state status to the console
         */
        echo $this->getState() . PHP_EOL;
    }

    public function __toString()
    {
        return 'The Turnstile Application' . PHP_EOL . $this->getState(). PHP_EOL;
    }
}
