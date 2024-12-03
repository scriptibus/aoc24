<?php

declare(strict_types=1);

namespace Riddle;

use LogicException;

use const PREG_SET_ORDER;

final readonly class Parser
{
    /**
     * @return array<int, array<int, int>|bool>
     */
    public function parse(string $input): array
    {
        $multiplications = [];
        preg_match_all('/mul\((?<multiplicand>\d{1,3}),(?<multiplier>\d{1,3})\)|(?<control>do\(\)|don\'t\(\))/', $input, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            if (isset($match['control'])) {
                $multiplications[] = $match['control'] === 'do()';
                continue;
            }
            if (!isset($match['multiplicand']) || !isset($match['multiplier'])) {
                throw new LogicException('Either multiplication or control capture groups must be set');
            }
            $multiplications[] = [(int) $match['multiplicand'], (int) $match['multiplier']];
        }

        return $multiplications;
    }
}
