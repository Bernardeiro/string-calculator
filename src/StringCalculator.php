<?php

namespace Deg540\StringCalculatorPHP;

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

            return array_sum(explode(',', $numbers));
        }

        if (str_contains($numbers, ',')) {
            return array_sum(explode(',', $numbers));
        }

        return $numbers;
    }
}