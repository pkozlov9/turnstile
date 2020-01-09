<?php

namespace src\turnstile\states;

interface StateInterface
{
    public function insertToken();
    public function passThru();
}
