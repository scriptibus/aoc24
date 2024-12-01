<?php

declare(strict_types=1);
use Riddle\ListDistanceCalculator;
use Riddle\Parser;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var non-empty-string $input */
$input = file_get_contents(__DIR__ . '/../input/input.txt');

[$listA, $listB] = (new Parser())->parse($input);

echo (new ListDistanceCalculator())->calculateDistance($listA, $listB);
