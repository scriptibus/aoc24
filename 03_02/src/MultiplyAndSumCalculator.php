<?php

declare(strict_types=1);

namespace Riddle;

use function is_bool;

final readonly class MultiplyAndSumCalculator
{
    /**
     * @param array<int, array<int, int>|bool> $multiplications
     */
    public function multiplyAndSum(array $multiplications): int
    {
        $sum = 0;
        $do = true;
        foreach ($multiplications as $multiplication) {
            if (is_bool($multiplication)) {
                $do = $multiplication;
                continue;
            }
            if ($do) {
                $sum += $multiplication[0] * $multiplication[1];
            }
        }

        return $sum;
    }
}
