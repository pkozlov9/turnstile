<?php

namespace src\turnstile\states;

use src\turnstile\Turnstile;

class UnlockedTurnstileState implements StateInterface
{
    private $turnstile;

    public function __construct(Turnstile $turnstile)
    {
        $this->turnstile = $turnstile;
    }

    public function insertToken()
    {
        echo 'Accepting token in the ' . $this->turnstile->getState() . ' state...' . PHP_EOL;
    }

    public function passThru()
    {
        echo 'Passing through in the ' . $this->turnstile->getState() . ' state...' . PHP_EOL;
        $this->turnstile->lock();
    }

    public function __toString()
    {
        return 'UNLOCKED';
    }
}
