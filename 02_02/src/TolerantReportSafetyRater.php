<?php

declare(strict_types=1);

namespace Riddle;

final readonly class TolerantReportSafetyRater
{
    public function __construct(
        private ReportSafetyRater $reportSafetyRater,
    ) {
    }

    /**
     * @param array<int, int> $report
     */
    public function isSafe(array $report): true|int
    {
        $result = $this->reportSafetyRater->isSafe($report);

        if ($result === true) {
            return true;
        }

        if ($this->checkWithoutLevel($report, $result) === true) {
            return true;
        }

        if ($this->checkWithoutLevel($report, $result - 1) === true) {
            return true;
        }

        // in case first level indicates wrong direction
        if ($result === 2 && $this->checkWithoutLevel($report, 0) === true) {
            return true;
        }

        return $result;
    }

    /**
     * @param array<int,int> $report
     */
    private function checkWithoutLevel(array $report, int $ignoreIndex): true|int
    {
        unset($report[$ignoreIndex]);
        $report = array_values($report);

        return $this->reportSafetyRater->isSafe($report);
    }
}
