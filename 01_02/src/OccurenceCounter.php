<?php

declare(strict_types=1);

namespace Riddle;

final readonly class OccurenceCounter
{
    /**
     * @param array<int, string> $list
     *
     * @return array<int, int>
     */
    public function count(array $list): array
    {
        $occurences = [];
        foreach ($list as $element) {
            $element = (int) $element;
            if (isset($occurences[$element])) {
                ++$occurences[$element];
            } else {
                $occurences[$element] = 1;
            }
        }

        return $occurences;
    }
}
