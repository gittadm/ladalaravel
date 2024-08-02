<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Task2Controller extends Controller
{
    public function task1()
    {
        /*
         * 12. Дан массив из одинаковых по структуре массивов
         * с любым уровнем вложенности. Например,
         *  $a = [
                ['developer' => [
                           'id' => 1,
                            'name' => 'Ivan',
                             'address' => [
                                    'city' => ['ru' => 'Минск', 'en' => Minsk'],
                                        'street' => 'Lazareva'
                                ]
                ]],
                ['developer' => ['id' => 2, 'name' => 'Petr', 'address' => ['city' => 'Moscow', 'street' => 'Lenina']]]],
            ];
        Написать функцию pluck(), которая из данного массива
        получается одномерный массив из значений,
        путь к которым указан в виде строки из ключей через точку.
        Например, plain($a, 'developer.address.city.ru') вернет массив ['Ivan', 'Petr']
         */

        /*
            Дан массив чисел. Выполнить сортировку по четности,
            то есть сначала должны идти четные, потом нечетные.
            Можно использовать usort.

           $a = [1, 5, 3, 1];

           $a = [[1, 2], [2, 3], [3, 3], [4, 5]]
            [1, 2] < [2, 3] потому что 1 + 2 < 2 + 3
            [1, 2] > [2, 3] потому что 1 < 2 (сравниваем первые числа)
        */

        $a = [1, 2, 4, 5, 3, 4, 1];
        $a = [1, 4, 2, 5, 3, 4, 1];

        //  a < b :  четное число меньше нечетного
        //  a = b :  одной четности

        function my_sort($a, $b)
        {
            if ($a % 2 == 0 && $b % 2 == 1) {
                return -1;
            }
            if ($a % 2 == 1 && $b % 2 == 0) {
                return 1;
            }
            // одной четности
            return 0;
        }

        /**
         * Дан двумерный массив.
         * Например, $a=[[100,100],[1,2,3],[4,5],[0,-1],[1,2,3,4,5]];
         * Переставить элементы массива $a так, чтобы
         * их суммы чисел возрастали.
         * То есть $a=[[0,-1], [1,2,3],[4,5],[1,2,3,4,5],[100,100]];
         * Можно использовать usort.
         */
        $a = [[0, -1], [1, 2, 3], [4, 5], [1, 2, 3, 4, 5], [100, 100]];
        function my_sort($a, $b)
        {
            $sumA = array_sum($a);
            $sumB = array_sum($b);

            if ($sumA < $sumB) {
                return -1;
            }
            if ($sumB < $sumA) {
                return 1;
            }

            if ($sumA == $sumB) {
                return 0;
            }
        }

        usort($a, 'my_sort');
    }

    public function task2()
    {
        /*
            Дана строка символов (символы генерируются случайно).
            Удали из строки идущие подряд буквы
            Пример: abcabcdaaafeecbaccc => abcabcdafecbac
        */
    }

    public function task3()
    {
        // Добавить в базу данных одну книгу

        $book = new Book();

        $book->title = 'Мартин Иден 2';
        $book->author = 'Джек Лондон 2';
        $book->year = 2025;
        $book->description = 'Повесть';

        $book->save();

        echo $book->id;
    }

    public function books()
    {
        /*
         * Выводить данные на экран в виде таблицы из бд,
         * сделать кнопку, чтобы удаляла по одной строке
         * этих данных
         */

        // все книги
        $books = Book::all();

        // получить все книги, у которых год равен 2020
        $books = Book::where('year', 2020)->get();

        // получить книгу, у которой id = 1
        $book = Book::find(1);

        // получить все книги, у которых год больше или равен 2000
        // <, >, <=, >=, <>, !=
        $books = Book::where('year', '>=', 2020)->get();

        // получить все книги, у которых год от 2000 до 2023 и
        // у которых есть description (не null)
        // у которых автор Джек Лондон
        // и результат отсортировать по title

        $books = Book::where('author', 'Джек Лондон')
            ->whereNotNull('description')  // ->whereNull('description')
//            ->where('year', '<=', 2023)
//            ->where('year', '>=', 2000)
            ->whereBetween('year', [2000, 2023])
            ->orderBy('title', 'desc') // по убыванию
            ->get();

        $books = Book::orderBy('id')->get();

        return view('books', ['books' => $books]);
    }

    public function deleteBook(int $id)
    {
        Book::where('id', $id)->delete();

        return redirect()->route('books');
    }

    public function filterBooks(Request $request)
    {
        // dd($request->all());

        $title = $request->title;
        $year = $request->year;

        $books = Book::query();

        if (!empty($year)) {
            $books->where('year', $year);
        }

        if (!empty($title)) {
            $title = Str::lower(trim($title));
            $books->where('title', 'like', '%' . $title . '%');
        }

        $books->orderBy('id');

        $books = $books->get();

        return view('books', compact('books', 'title', 'year'));
//        return view('books',
//                    ['books' => $books, 'title' => $title, 'year' => $year]);
    }
}
