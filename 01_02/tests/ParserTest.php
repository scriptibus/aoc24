<?php

declare(strict_types=1);

namespace RiddleTests;

use PHPUnit\Framework\TestCase;
use Riddle\Parser;
use RuntimeException;

final class ParserTest extends TestCase
{
    /**
     * @throws RuntimeException
     */
    public function testParsesExample(): void
    {
        /** @var non-empty-string $input */
        $input = file_get_contents(__DIR__ . '/../input/example.txt');

        $parser = new Parser();
        [$resultA, $resultB] = $parser->parse($input);

        $this->assertSame(['3', '4', '2', '1', '3', '3'], $resultA);
        $this->assertSame(['4', '3', '5', '3', '9', '3'], $resultB);
    }
}
