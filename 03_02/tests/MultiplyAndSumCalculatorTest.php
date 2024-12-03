<?php

declare(strict_types=1);

namespace RiddleTests;

use PHPUnit\Framework\TestCase;
use Riddle\MultiplyAndSumCalculator;

final class MultiplyAndSumCalculatorTest extends TestCase
{
    public function testCalculatesExampleCorrectly(): void
    {
        $multiplications = [[2, 4], [5, 5], [11, 8], [8, 5]];

        $result = (new MultiplyAndSumCalculator())->multiplyAndSum($multiplications);

        $this->assertSame(161, $result);
    }
}