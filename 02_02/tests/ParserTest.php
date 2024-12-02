<?php

declare(strict_types=1);

namespace RiddleTests;

use PHPUnit\Framework\TestCase;
use Riddle\Parser;

final class ParserTest extends TestCase
{
    public function testParsesExample(): void
    {
        /** @var string $input */
        $input = file_get_contents(__DIR__ . '/../input/example.txt');

        $result = (new Parser())->parse($input);

        $this->assertSame([
            [7, 6, 4, 2, 1],
            [1, 2, 7, 8, 9],
            [9, 7, 6, 2, 1],
            [1, 3, 2, 4, 5],
            [8, 6, 4, 4, 1],
            [1, 3, 6, 7, 9],
        ], $result);
    }
}
