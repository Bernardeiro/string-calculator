<?php

namespace Deg540\StringCalculatorPHP;

use function PHPUnit\Framework\throwException;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if (empty($numbers)) {
            return 0;
        }

        $numbers = str_replace('\n', ',', $numbers);

        if (str_contains($numbers, '//')) {
            $delimiter = substr($numbers, 2, 1);
            $numbers = str_replace(['//' . $delimiter . ',', $delimiter], ['', ','], $numbers);
            foreach (explode(',', $numbers) as $number) {
                if ($number < 0) {
                    throw new \Exception('Negativos no soportados');
                }
            }

            return array_sum(explode(',', $numbers));
        }

        foreach (explode(',', $numbers) as $number) {
            if ($number < 0) {
                throw new \Exception('Negativos no soportados');
            }
        }

        if (str_contains($numbers, ',')) {
            return array_sum(explode(',', $numbers));
        }

        return $numbers;
    }
}