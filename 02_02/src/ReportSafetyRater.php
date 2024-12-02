<?php

declare(strict_types=1);

namespace Riddle;

use LogicException;

use function count;

final readonly class ReportSafetyRater
{
    /**
     * @param array<int, int> $report
     */
    public function isSafe(array $report): bool
    {
        if (count($report) < 2) {
            throw new LogicException('Report must have at least two levels');
        }

        $goesUp = $report[0] < $report[1];
        for ($i = 1; $i < count($report); ++$i) {
            if ($report[$i - 1] < $report[$i] !== $goesUp) {
                return false;
            }
            $distanceOfLevels = abs($report[$i - 1] - $report[$i]);
            if ($distanceOfLevels > 3 || $distanceOfLevels < 1) {
                return false;
            }
        }

        return true;
    }
}
