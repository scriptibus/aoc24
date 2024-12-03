<?php

declare(strict_types=1);

namespace Riddle;

use const PREG_SET_ORDER;

final readonly class Parser
{
    /**
     * @return array<int, array<int, int>>
     */
    public function parse(string $input): array
    {
        $multiplications = [];
        preg_match_all('/mul\((?<multiplicand>\d{1,3}),(?<multiplier>\d{1,3})\)/', $input, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $multiplications[] = [(int) $match['multiplicand'], (int) $match['multiplier']];
        }

        return $multiplications;
    }
}
