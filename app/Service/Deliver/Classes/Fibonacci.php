<?php

namespace App\Service\Deliver\Classes;

class Fibonacci
{
    public static function calculate($n): int
    {
        if ($n == 1 || $n == 2) {
            return 1;
        } else {
            $prev = 1;
            $curr = 1;
            for ($i = 3; $i <= $n; $i++) {
                $next = $prev + $curr;
                $prev = $curr;
                $curr = $next;
            }
            return $curr;
        }
    }
}
