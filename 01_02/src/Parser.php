<?php

declare(strict_types=1);

namespace Riddle;

use RuntimeException;

use const PHP_EOL;

final readonly class Parser
{
    /**
     * @param non-empty-string $input
     *
     * @throws RuntimeException
     *
     * @return array<int, array<int, string>>
     */
    public function parse(string $input): array
    {
        $lines = explode(PHP_EOL, $input);

        $listA = [];
        $listB = [];
        foreach ($lines as $line) {
            if ($line === '') {
                continue;
            }
            [$listA[], $listB[]] = explode('   ', $line);
        }

        return [$listA, $listB];
    }
}
