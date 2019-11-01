<?php 

namespace App;

class Calculator {
    public static function add($a, $b): int
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Only numbers allowed for addition.");
        }
        return $a+$b;
    }

    public static function sub($a, $b): int
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Only numbers allowed for addition.");
        }
        return $a-$b;
    }

    public static function mul($a, $b): int
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Only numbers allowed for addition.");
        }
        return $a*$b;
    }

    public static function div($a, $b): float
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \InvalidArgumentException("Only numbers allowed for addition.");
        }
        if ($b == 0) {
            throw new \InvalidArgumentException("Divide by zero.");
        }
        return $a/$b;
    }

    public  function doSomeThing(){
        return 'bar';
    }
}