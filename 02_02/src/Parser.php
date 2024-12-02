<?php

declare(strict_types=1);

namespace Riddle;

use const PHP_EOL;

final readonly class Parser
{
    /**
     * @return array<int, array<int, int>>
     */
    public function parse(string $input): array
    {
        $lines = explode(PHP_EOL, $input);

        $reports = [];
        foreach ($lines as $line) {
            if ($line === '') {
                continue;
            }
            $reports[] = array_map(static fn (string $report): int => (int) $report, explode(' ', $line));
        }

        return $reports;
    }
}
