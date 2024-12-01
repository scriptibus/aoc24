<?php

declare(strict_types=1);

namespace Riddle;

use RuntimeException;

use function count;

final readonly class ListDistanceCalculator
{
    /**
     * @param array<int, string> $listA
     * @param array<int, string> $listB
     *
     * @throws RuntimeException
     */
    public function calculateDistance(array $listA, array $listB): int
    {
        if (count($listA) !== count($listB)) {
            throw new RuntimeException('Lists must have same length');
        }

        sort($listA);
        sort($listB);

        $distance = 0;
        for ($i = 0; $i < count($listA); ++$i) {
            $distance += abs((int) $listA[$i] - (int) $listB[$i]);
        }

        return $distance;
    }
}
