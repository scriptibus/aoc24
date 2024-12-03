<?php

declare(strict_types=1);
use Riddle\MultiplyAndSumCalculator;
use Riddle\Parser;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var string $input */
$input = file_get_contents(__DIR__ . '/../input/input.txt');

$multiplications = (new Parser())->parse($input);

echo (new MultiplyAndSumCalculator())->multiplyAndSum($multiplications);
