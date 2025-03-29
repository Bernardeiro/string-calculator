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
        $numbersHigherThan1000 = 0;
        $negativeNumbers = [];
        $numbers = str_replace('\n', ',', $numbers);

        if (str_contains($numbers, '//')) {
            $numbers = $this->extraeSeparador($numbers);

            foreach (explode(',', $numbers) as $number) {
                if ($number < 0) {
                    $negativeNumbers[] = $number;
                } else if ($number > 1000) {
                    $numbersHigherThan1000 .= $number;
                }
            }
            if (!empty($negativeNumbers)) {
                throw new \Exception('Negativos no soportados: ' . implode(', ', $negativeNumbers));
            }

            return array_sum(explode(',', $numbers)) - $numbersHigherThan1000;
        }

        foreach (explode(',', $numbers) as $number) {
            if ($number < 0) {
                $negativeNumbers[] = $number;
            }else if ($number > 1000) {
                $numbersHigherThan1000 .= $number;
            }
        }
        if (!empty($negativeNumbers)) {
            throw new \Exception('Negativos no soportados: ' . implode(', ', $negativeNumbers));
        }

        if (str_contains($numbers, ',')) {
            return array_sum(explode(',', $numbers)) - $numbersHigherThan1000;
        }

        return $numbers;
    }

    /**
     * @param array|string $numbers
     * @return array|string|string[]
     */
    public function extraeSeparador(array|string $numbers): string|array
    {
        $delimiter = substr($numbers, 2, 1);
        $numbers = str_replace(['//' . $delimiter . ',', $delimiter], ['', ','], $numbers);
        return $numbers;
    }
}