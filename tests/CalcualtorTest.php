<?php 

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalcualtorTest extends TestCase {
    
    /**
     * @dataProvider validInputProvider
     */
    function testAdd($a, $b) {
        $this->assertEquals(Calculator::add($a, $b), $a+$b);
    }

    /**
     * @dataProvider validInputProvider
     */
    function testSub($a, $b) {
        $this->assertEquals(Calculator::sub($a, $b), $a-$b);
    }

    /**
     * @dataProvider validInputProvider
     */
    function testMultiply($a, $b) {
        $this->assertEquals(Calculator::mul($a, $b), $a*$b);
    }

    /**
     * @dataProvider validInputProvider
     */
    function testDiv($a, $b) {
        $this->assertEquals(Calculator::div($a, $b), $a/$b);
    }

    /**
     * @dataProvider invalidInputProvider
     */
    function testInValidArgument($a, $b) {
        $this->expectException(InvalidArgumentException::class);
        Calculator::add($a, $b);
        Calculator::sub($a, $b);
        Calculator::mul($a, $b);
        Calculator::div($a, $b);
    }

    function testDivideByZero() {
        $this->expectException(InvalidArgumentException::class);
        Calculator::div(10, 0);
    }

    public function validInputProvider()
    {
        return [
            [0, 5],
            [5, 3],
            [5, -3],
        ];
    }

    public function invalidInputProvider()
    {
        return [
            ['aa', 'bb'],
            [2, 'bb']
        ];
    }
}