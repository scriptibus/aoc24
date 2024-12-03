<?php

declare(strict_types=1);

namespace Riddle;

final readonly class MultiplyAndSumCalculator
{
    /**
     * @param array<int, array<int, int>> $multiplications
     */
    public function multiplyAndSum(array $multiplications): int
    {
        $sum = 0;
        foreach ($multiplications as $multiplication) {
            $sum += $multiplication[0] * $multiplication[1];
        }

        return $sum;
    }
}
