<?php

namespace src\turnstile\states;

use src\turnstile\Turnstile;

class LockedTurnstileState implements StateInterface
{
    private $turnstile;

    public function __construct(Turnstile $turnstile)
    {
        $this->turnstile = $turnstile;
    }

    public function insertToken()
    {
        echo 'Accepting token in the ' . $this->turnstile->getState() . ' state...' . PHP_EOL;
        $this->turnstile->unlock();
    }

    public function passThru()
    {
        echo 'Passing through in the ' . $this->turnstile->getState() . ' state....' . PHP_EOL;
        $this->turnstile->alarm();
    }

    public function __toString()
    {
        return 'LOCKED';
    }
}
