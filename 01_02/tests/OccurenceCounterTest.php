<?php

declare(strict_types=1);

namespace RiddleTests;

use PHPUnit\Framework\TestCase;
use Riddle\OccurenceCounter;
use RuntimeException;

final class OccurenceCounterTest extends TestCase
{
    /**
     * @throws RuntimeException
     */
    public function testExampleInput(): void
    {
        $list = [
            '3',
            '4',
            '2',
            '1',
            '3',
            '3',
        ];

        $counter = new OccurenceCounter();
        $occurences = $counter->count($list);
        ksort($occurences);

        $this->assertSame([
            1 => 1,
            2 => 1,
            3 => 3,
            4 => 1,
        ], $occurences);
    }
}
