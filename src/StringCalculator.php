<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if (str_contains($numbers, ',') || str_contains($numbers, '\n')) {
            $numbers = str_replace('\n', ',', $numbers);
            $numbersArray = explode(',', $numbers);
            $numbersArray = array_map('intval', $numbersArray);
            $numbers = array_sum($numbersArray);
        }


        if (empty($numbers)) {
            return 0;
        }

        return $numbers;
    }
}