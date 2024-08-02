<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Книги</title>
    </head>
    <body>
        <h1>Книги</h1>

        <form action="" method="get">
            <input type="text" value="{{ $title }}" name="title" placeholder="Название" autocomplete="off">
            <input type="number" value="{{ $year }}" name="year" placeholder="Год" min="1950" max="2025" autocomplete="off">
            <button type="submit">Найти</button>
            <a href="{{ route('books') }}">Очистить</a>
        </form>
        <table>
            <tr>
                <td>ID</td>
                <td>Название</td>
                <td>Автор</td>
                <td>Описание</td>
                <td>Год</td>
                <td>Добавлено</td>
                <td></td>
            </tr>

            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->created_at }}</td>
                    <td><a href="{{ route('books.delete', [$book->id]) }}">Удалить</a></td>
                </tr>
            @endforeach
        </table>

    </body>
</html>
