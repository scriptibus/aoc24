<?php

declare(strict_types=1);

namespace RiddleTests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Riddle\ReportSafetyRater;
use Riddle\TolerantReportSafetyRater;

final class TolerantReportSafetyRaterTest extends TestCase
{
    /**
     * @return array<int, array<int, array<int, int>|bool>>
     */
    public static function provideExampleData(): array
    {
        return [
            [[7, 6, 4, 2, 1], true],
            [[1, 2, 7, 8, 9], false],
            [[9, 7, 6, 2, 1], false],
            [[1, 3, 2, 4, 5], true],
            [[8, 6, 4, 4, 1], true],
            [[1, 3, 6, 7, 9], true],
            [[1, 3, 6, 7, 99], true],
            [[1, 2, 3, 9, 5], true],
            [[9, 2, 3, 4, 5], true],
            [[9, 7, 6, 3, 5, 1], true],
        ];
    }

    /**
     * @param array<int, int> $report
     */
    #[DataProvider('provideExampleData')]
    public function testRatesExampleDataCorrectly(array $report, bool $expectedSafe): void
    {
        $result = (new TolerantReportSafetyRater(new ReportSafetyRater()))->isSafe($report);

        $this->assertSame($result === true, $expectedSafe);
    }
}
