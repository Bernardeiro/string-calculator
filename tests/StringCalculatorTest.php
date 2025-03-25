<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stringCalculator = new StringCalculator();
    }

    /**
     * @test
     */
    public function givenSingleNumberReturnsSameNumber(): void
    {
        $this->assertEquals(1, $this->stringCalculator->add('1'));
    }

    /**
     * @test
     */
    public function givenNumbersReturnsAddNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->add('1,2,3'));
    }

    /**
     * @test
     */
    public function givenNumbersSeparatedBySemicolonReturnsSumOfNumber(): void
    {
        $this->assertEquals(3, $this->stringCalculator->add('//;\n1;2'));
    }
}