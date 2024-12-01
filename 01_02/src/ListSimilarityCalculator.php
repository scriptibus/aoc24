<?php

declare(strict_types=1);

namespace Riddle;

use RuntimeException;

use function count;

final readonly class ListSimilarityCalculator
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

        $occurencesB = (new OccurenceCounter())->count($listB);

        $similarity = 0;
        foreach ($listA as $element) {
            $element = (int) $element;
            if (isset($occurencesB[$element])) {
                $similarity += $element * $occurencesB[$element];
            }
        }

        return $similarity;
    }
}
