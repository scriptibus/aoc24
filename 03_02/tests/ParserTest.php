<?php

declare(strict_types=1);

namespace RiddleTests;

use PHPUnit\Framework\TestCase;
use Riddle\Parser;

final class ParserTest extends TestCase
{
    public function testParsesExampleCorrectly(): void
    {
        /** @var string $input */
        $input = file_get_contents(__DIR__ . '/../input/example.txt');

        $result = (new Parser())->parse($input);

        $this->assertSame([[2, 4], false, [5, 5], [11, 8], true, [8, 5]], $result);
    }
}
