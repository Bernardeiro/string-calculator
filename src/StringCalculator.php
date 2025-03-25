<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if (empty($numbers)) {
            return 0;
        }

        $numbers = str_replace('\\n', ',', $numbers);

        return array_sum(explode(',', $numbers));
    }
}