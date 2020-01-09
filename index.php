<?php

namespace src\turnstile;

require_once __DIR__ . '/vendor/autoload.php';

$turnstile = new Turnstile();

// first person inserts a token and passes through the turnstile
echo $turnstile;
$turnstile->insertToken();
$turnstile->passThru();

// second person attempts to pass through turnstile without inserting a token
echo $turnstile;
$turnstile->passThru();
$turnstile->insertToken();
$turnstile->passThru();

// third person attempts to pass through turnstile without initially inserting a token
echo $turnstile;
$turnstile->insertToken();
$turnstile->insertToken();
$turnstile->passThru();

?>