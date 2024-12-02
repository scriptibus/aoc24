<?php

declare(strict_types=1);
use Riddle\Parser;
use Riddle\ReportSafetyRater;
use Riddle\TolerantReportSafetyRater;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var string $input */
$input = file_get_contents(__DIR__ . '/../input/input.txt');
$reports = (new Parser())->parse($input);

$rater = new ReportSafetyRater();
$tolerantRater = new TolerantReportSafetyRater($rater);

$safeReportCount = 0;
foreach ($reports as $report) {
    $safeReportCount += (int) ($tolerantRater->isSafe($report) === true);
}

echo $safeReportCount;
