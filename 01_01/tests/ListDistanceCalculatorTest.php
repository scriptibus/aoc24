<?php

declare(strict_types=1);

namespace RiddleTests;

use PHPUnit\Framework\TestCase;
use Riddle\ListDistanceCalculator;
use RuntimeException;

final class ListDistanceCalculatorTest extends TestCase
{
    /**
     * @throws RuntimeException
     */
    public function testExampleInput(): void
    {
        $listA = [
            '3',
            '4',
            '2',
            '1',
            '3',
            '3',
        ];
        $listB = [
            '4',
            '3',
            '5',
            '3',
            '9',
            '3',
        ];

        $calculator = new ListDistanceCalculator();
        $distance = $calculator->calculateDistance($listA, $listB);

        $this->assertSame(11, $distance);
    }
}
