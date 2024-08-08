<?php

namespace App\Http\Controllers;

class RegExpController extends Controller
{
    public function regexp()
    {
        $result = preg_match('/abc/i', 'hello abC 222', $matches);

        if ($result) {
            echo 'Yes';
        } else {
            echo 'No';
        }

        // ab.   - точка - спецсимвол-команда - любой символ
        // ac\.  - именно ищем точку
        // ab[cd] -  c или d
        // ab[a-f39]  буквы от a до f или 3 или 9
        // ab[a-zA-Z_0-9!]
        // ab[^abc] - на третьем месте любой кроме a, b, c
        // abc+  - с 1 или больше
        // \d{12} - ровно 12 цифр
        // \d{3,12} - от 3 до 12
        // \d{3,} - 3 и более
        // (\+){0,1}375\d{9}
        // (\+)?375\d{9}s{0,}
        // w{3}\.\w+\.(ru|com|net)
    }
}
