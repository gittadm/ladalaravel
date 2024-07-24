<?php

namespace App\Http\Controllers;

class TaskController extends Controller
{
    public function task1()
    {
        $a = [1, 2, 3];
        $x = 1234;

        return view(
            'task1',
            [
                'a' => $a,
                'x' => $x,
            ]
        );
    }

    public function task2()
    {
        // сгенерировать рандомное число от 1 до 1000000000
        // найти сумму цифр этого числа

        $n = mt_rand(100, 500); // 1, 1000000000
        $m = $n;
        // $n = 12345

        $sum = 0;

        while ($n !== 0) {
            $sum += $n % 10;
            $n = intdiv($n, 10);
        }

        return view('task2', ['n' => $m, 'k' => $sum]);
    }

    public function task3()
    {
        // Сгенерировать рандомное число от 1 до 1000000000
        // найти кол-во четных цифр

        $n = mt_rand(1, 1000000000);
        $m = $n;
        // $n = 12345

        $count = 0;

        while ($n !== 0) {
            $digit = $n % 10;
            $n = intdiv($n, 10);
            if ($digit % 2 == 0) {
                $count++;
            }
        }

        return view('task3', ['n' => $m, 'count' => $count]);
    }

    public function task4()
    {
        // Сгенерировать рандомное число от 1 до 1000000000
        // найти наибольшую цифру

        $n = mt_rand(1, 1000000000);
        $m = $n;
        $maxDigit = 0;

        while ($n !== 0) {
            $digit = $n % 10;
            $n = intdiv($n, 10);
            if ($digit > $maxDigit) {
                $maxDigit = $digit;
            }
        }

        return view('task4', ['n' => $m, 'max' => $maxDigit]);
    }

    public function task5()
    {
        //  Дан массив. Найти числа, которые равны сумме своих соседей
        // [1, 3, 2, 0, -1, 1, 2, 6]
        // ответ: 3, 1

        $a = [1, 3, 2, 0, -1, 1, 2, 6];
        $b = [];

        for ($i = 1; $i < count($a) - 1; $i++) {
            if ($a[$i] == $a[$i - 1] + $a[$i + 1]) {
                $b[] = $a[$i];
            }
        }

        return view('task5', ['a' => $a, 'b' => $b]);
    }
}
